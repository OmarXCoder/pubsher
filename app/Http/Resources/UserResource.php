<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class UserResource extends JsonResource
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
            'type'            => 'User',
            'id'              => $this->id,
            'name'            => $this->name,
            'username'        => $this->username,
            'avatar_url'      => $this->avatar_url,
            'is_current_user' => $this->is(Auth::user()),
            'is_following'    => $this->isFollowing(Auth::user()),
            'is_followed_by'  => $this->isFollowedBy(Auth::user()),
        ];
    }
}
