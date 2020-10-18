<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\Token\FullTokenResource;
use App\Http\Resources\Device\MinimalDeviceResource;
use App\Http\Resources\User\MediumUserResource;
use App\Models\User;
use App\Services\DeviceService;
use App\Services\TokenService;
use App\Services\UserService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    private DeviceService $deviceService;
    private TokenService $tokenService;
    private UserService $userService;

    /**
     * AuthController constructor.
     * @param DeviceService $deviceService
     * @param TokenService $tokenService
     * @param UserService $userService
     */
    public function __construct(DeviceService $deviceService, TokenService $tokenService, UserService $userService)
    {
        $this->deviceService = $deviceService;
        $this->tokenService = $tokenService;
        $this->userService = $userService;
    }

    /**
     * @param RegisterRequest $request
     * @return MediumUserResource
     */
    public function register(RegisterRequest $request): MediumUserResource
    {
        $validated = $request->validated();

        $user = $this->userService->createUser($validated);
        $this->deviceService->findOrCreateDeviceForUser($user, $validated['device_name'], $validated['device_os']);
        $user->fresh();

        return MediumUserResource::make($user);
    }

    /**
     * @param LoginRequest $request
     * @return FullTokenResource
     * @throws ValidationException
     */
    public function login(LoginRequest $request): FullTokenResource
    {
        $validated = $request->validated();

        /** @var User $user */
        $user = User::query()->where('email', $validated['email'])->first();
        $this->userService->validateUserPassword($user, $validated['password']);
        $device = $this->deviceService->findOrCreateDeviceForUser($user, $validated['device_name'], $validated['device_os']);
        $token = $this->tokenService->getRevokedTokenForDevice($device);

        return FullTokenResource::make($token);
    }
}
