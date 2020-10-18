<?php

namespace App\Services;

use App\Models\Device;
use Laravel\Sanctum\NewAccessToken;

class TokenService
{
    /**
     * @param Device $device
     * @return mixed
     */
    public function getRevokedTokenForDevice(Device $device): NewAccessToken
    {
        $user = $device->user;
        $user->tokens()->where('name', $device->id)->delete();

        return $user->createToken($device->id);
    }
}
