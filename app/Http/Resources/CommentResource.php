<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class CommentResource extends JsonResource
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
            'type'              => 'Comment',
            'id'                => $this->id,
            'body'              => $this->body,
            'user'              => new UserResource($this->whenLoaded('user')),
            'likes_count'       => $this->likes_count,
            'published_at_diff' => $this->publishedAtDiff,
            'is_liked_by'       => $this->isLikedBy(),
            'by_current_user'   => $this->user->is(Auth::user())
        ];
    }
}
