<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TopicResource extends JsonResource
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
            'type'            => 'Topic',
            'id'              => $this->id,
            'name'            => $this->name,
            'slug'            => $this->slug,
            'avatar_url'      => $this->avatar_url,
            'color'           => $this->meta->color ?? null,
            'followers_count' => $this->followers_count,
            'is_followed_by'  => $this->isFollowedBy()
        ];
    }
}
