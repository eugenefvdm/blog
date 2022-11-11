<?php

namespace App\Models;

use App\Enums\Status;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;
use App\Services\Settings;
use Spatie\Sitemap\Tags\Url;
use Spatie\Sluggable\HasSlug;
use App\Traits\ImageCompression;
use Spatie\Sluggable\SlugOptions;
use Spatie\EloquentSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\EloquentSortable\SortableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model implements Sortable, Sitemapable, Feedable, Auditable
{
    use HasFactory;
    use SoftDeletes;
    use HasSlug;
    use SortableTrait;
    use ImageCompression;
    use \OwenIt\Auditing\Auditable;

    protected $casts = [
        'tags' => 'array',
    ];

    protected $fillable = [
        'title',
        'excerpt',
        'description',
        'body',
        'category_id',
        'tags',
        'featured_image',
        'attachment_file_names',
        'status',
        'order_column',
    ];

    public $sortable = [
        'order_column_name' => 'order_column',
        'sort_when_creating' => true,
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            if (auth()->id()) {
                $post->user_id = auth()->id();
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function toSitemapTag(): Url | string | array
    {
        return route('blog.post.show', [$this->category, $this]);
    }

    public function toFeedItem(): FeedItem
    {
        return FeedItem::create([
            'id' => $this->id,
            'title' => $this->title,
            'summary' => $this->excerpt,
            'updated' => $this->updated_at,
            'link' => $this->url,
            'authorName' => $this->user->name,
        ]);
    }

    public static function getFeedItems()
    {
        return Post::published()->get();
    }

    // Getters

    public function getAdminUrlAttribute()
    {
        return "/admin/posts/{$this->slug}/edit";
    }

    public function getContentAttribute()
    {
        if ($this->excerpt) {
            return $this->excerpt;
        }

        return $this->body;
    }

    public function getFormattedTagsAttribute()
    {
        $html = '';

        foreach ($this->tags()->get() as $tag) {
            $html .= "<a href='/tag/$tag->title'>$tag->title</a>, ";
        }

        return substr($html, 0, -2);
    }

    public function getImageAttribute()
    {
        return '/storage/images/'.$this->featured_image;
    }

    public function getUrlAttribute()
    {
        return "/{$this->category->slug}/{$this->slug}";
    }

    // Scopes

    public function scopePublished($query)
    {
        if (Settings::homePageLayout() == 'grid') {
            $query->whereStatus(Status::PUBLISHED)->ordered()->get();
        } else {
            $query->whereStatus(Status::PUBLISHED)->latest()->get();
        }
    }

    // Relationships

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
