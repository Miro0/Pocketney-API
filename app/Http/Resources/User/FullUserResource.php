<?php

namespace App\Http\Resources\User;

use App\Http\Resources\Device\MinimalDeviceResource;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class FullUserResource extends JsonResource
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
            'devices' => MinimalDeviceResource::collection($this->resource->devices),
            'created_at' => $this->resource->created_at,
            'update_at' => $this->resource->updated_at,
        ];
    }
}
