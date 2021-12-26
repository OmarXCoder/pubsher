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
            'title'          => $this->title,
            'excerpt'        => $this->excerpt,
            'content'        => $this->content,
            'author'         => new UserResource($this->whenLoaded('author')),
            'comments_count' => $this->comments_count,
            'published_at'   => $this->created_at->shortRelativeDiffForHumans()
        ];
    }
}
