<?php

namespace App\Http\Resources\User;

use App\Http\Resources\Device\MediumDeviceResource;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class MediumUserResource extends JsonResource
{
    /**
     * @var User
     */
    public $resource;

    /**
     * @param \Illuminate\Http\Request|null $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'email' => $this->resource->email,
            'devices' => MediumDeviceResource::collection($this->resource->devices),
        ];
    }
}
