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
            'type'      => 'Topic',
            'id'        => $this->id,
            'name'      => $this->name,
            'slug'      => $this->slug,
            'color'     => $this->meta['color'],
            'thumbnail' => $this->meta['thumbnail'],
        ];
    }
}
