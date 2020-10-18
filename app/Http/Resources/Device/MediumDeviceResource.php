<?php

namespace App\Http\Resources\Device;

use App\Http\Resources\User\MinimalUserResource;
use App\Models\Device;
use Illuminate\Http\Resources\Json\JsonResource;

class MediumDeviceResource extends JsonResource
{
    /**
     * @var Device
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
            'name' => $this->resource->name,
            'os' => $this->resource->os,
        ];
    }
}
