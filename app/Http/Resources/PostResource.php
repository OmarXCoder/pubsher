<?php
namespace App\Http\Resources;

use Carbon\Carbon;
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
        // Carbon::createFromDate()->shortRelativeDiffForHumans()
        return [
            'type'           => 'Post',
            'id'             => $this->id,
            'title'          => $this->title,
            'content'        => $this->when($this->resource->content !== null, $this->content),
            'author'         => new UserResource($this->whenLoaded('author')),
            'likes_count'    => $this->likes_count,
            'comments_count' => $this->comments_count,
            'published_at'   => $this->created_at->shortRelativeDiffForHumans(),
            'is_liked_by'    => $this->isLikedBy()
        ];
    }
}
