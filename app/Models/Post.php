<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use RalphJSmit\Laravel\SEO\Support\SEOData;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasSlug;
    
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
        'status',        
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

    public function getContentAttribute()
    {
        if ($this->excerpt) {
            return $this->excerpt;
        }

        return $this->body;
    }

    public function getImageAttribute() {
        return '/storage/' . $this->featured_image;
    }
    
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
