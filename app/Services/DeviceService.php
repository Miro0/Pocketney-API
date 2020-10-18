<?php

namespace App\Services;

use App\Models\Device;
use App\Models\User;

class DeviceService
{
    /**
     * @param User $user
     * @param $deviceName
     * @param null $deviceOs
     * @return Device
     */
    public function findOrCreateDeviceForUser(User $user, $deviceName, $deviceOs = null)
    {
        $device = $user->devices()->where('name', $deviceName)->first();

        if (!$device) {
            $device = Device::create([
                'user_id' => $user->id,
                'name' => $deviceName,
                'os' => $deviceOs,
            ]);
        }

        return $device;
    }
}

