<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Illuminate\Auth\AuthenticationException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        
        // Force JSON responses for API routes
        $exceptions->shouldRenderJsonWhen(function (Request $request, Throwable $e) {
            if ($request->is('api/*')) {
                return true;
            }

            return $request->expectsJson();
        });

        // Global API Error Handler
        $exceptions->render(function (Throwable $e, Request $request) {
            if ($request->is('api/*')) {
                
                if ($e instanceof ValidationException) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'The given data was invalid.',
                        'errors' => $e->errors(),
                    ], 422);
                }

                if ($e instanceof AuthenticationException) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Unauthenticated.',
                    ], 401);
                }

                if ($e instanceof NotFoundHttpException) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Resource not found.',
                    ], 404);
                }

                if ($e instanceof MethodNotAllowedHttpException) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Method not allowed.',
                    ], 405);
                }

                if ($e instanceof AccessDeniedHttpException) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Access denied.',
                    ], 403);
                }

                // Default fallback for other exceptions
                return response()->json([
                    'status' => 'error',
                    'message' => config('app.debug') ? $e->getMessage() : 'An unexpected error occurred.',
                ], 500);
            }
        });

    })->create();
