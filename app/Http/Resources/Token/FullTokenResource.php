<?php

namespace App\Http\Resources\Token;

use Illuminate\Http\Resources\Json\JsonResource;
use Laravel\Sanctum\NewAccessToken;

class FullTokenResource extends JsonResource
{
    /**
     * @var NewAccessToken
     */
    public $resource;

    /**
     * @param  \Illuminate\Http\Request|null  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'token' => $this->resource->plainTextToken,
        ];
    }
}
