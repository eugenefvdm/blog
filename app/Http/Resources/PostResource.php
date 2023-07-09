<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'excerpt' => strip_tags($this->excerpt),
            'body' => $this->body,
            'slug' => $this->slug,
            'date' => $this->updated_at->format('Y-m-d'),
        ];
        // return parent::toArray($request);
    }
}
