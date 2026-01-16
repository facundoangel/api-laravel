<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class customerResource extends JsonResource
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
            "title" => 'title: '.$this->name,
            "email" => '<'.$this->email.'>',
            "phone" => '+54 '.$this->phone,
            "example static" => "meta data static for example"
        ];
    }
}
