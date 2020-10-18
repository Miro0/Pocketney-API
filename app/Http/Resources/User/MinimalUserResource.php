<?php

namespace App\Http\Resources\User;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class MinimalUserResource extends JsonResource
{
    /**
     * @var User
     */
    public $resource;

    /**
     * @param  \Illuminate\Http\Request|null  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
        ];
    }
}
