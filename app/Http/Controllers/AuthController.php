<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterStudentRequest;
use App\Http\Requests\Auth\RegisterDosenRequest;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;

class AuthController extends BaseApiController
{
    protected AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Register a new Student.
     */
    public function registerAsStudent(RegisterStudentRequest $request): JsonResponse
    {
        $user = $this->authService->registerAsStudent($request->validated());

        return $this->success($user, 'Student successfully registered', 201);
    }

    /**
     * Register a new Dosen.
     */
    public function registerAsDosen(RegisterDosenRequest $request): JsonResponse
    {
        $user = $this->authService->registerAsDosen($request->validated());

        return $this->success($user, 'Dosen successfully registered', 201);
    }

    /**
     * Get a JWT via given credentials.
     */
    public function login(LoginRequest $request): JsonResponse
    {
        $token = $this->authService->login($request->validated());

        if (! $token) {
            return $this->error('Unauthorized', 401);
        }

        return $this->success($this->authService->getTokenDetails($token), 'Successfully logged in');
    }

    /**
     * Get the authenticated User.
     */
    public function me(): JsonResponse
    {
        return $this->success($this->authService->me());
    }

    /**
     * Log the user out (Invalidate the token).
     */
    public function logout(): JsonResponse
    {
        $this->authService->logout();

        return $this->success(null, 'Successfully logged out');
    }

    /**
     * Refresh a token.
     */
    public function refresh(): JsonResponse
    {
        $token = $this->authService->refresh();
        
        return $this->success($this->authService->getTokenDetails($token), 'Token refreshed');
    }
}
