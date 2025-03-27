<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Session\TokenMismatchException;
use Throwable;

class Handler extends ExceptionHandler
{
    protected $dontReport = [
        AuthenticationException::class,
        ValidationException::class,
        TokenMismatchException::class,
    ];

    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register()
    {
        $this->reportable(function (Throwable $e) {
            if (app()->bound('sentry')) {
                app('sentry')->captureException($e);
            }
        });

        $this->renderable(function (ModelNotFoundException $e) {
            return response()->view('errors.404', [], 404);
        });

        $this->renderable(function (NotFoundHttpException $e) {
            return response()->view('errors.404', [], 404);
        });

        $this->renderable(function (TokenMismatchException $e) {
            return redirect()->back()
                ->withInput($request->except('password'))
                ->with('error', 'Your session has expired. Please try again.');
        });
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof TokenMismatchException) {
            return redirect()->back()
                ->withInput($request->except('password'))
                ->with('error', 'Your session has expired. Please try again.');
        }

        if ($this->isHttpException($exception)) {
            try {
                $statusCode = $exception->getStatusCode();
                
                switch ($statusCode) {
                    case 403:
                        return response()->view('errors.403', [
                            'message' => 'Unauthorized access'
                        ], 403);

                    case 404:
                        return response()->view('errors.404', [
                            'message' => 'Page not found'
                        ], 404);

                    case 500:
                        return response()->view('errors.500', [
                            'message' => 'Server error'
                        ], 500);

                    default:
                        return response()->view('errors.default', [
                            'code' => $statusCode,
                            'message' => $exception->getMessage()
                        ], $statusCode);
                }
            } catch (\Exception $e) {
                return response()->view('errors.500', [
                    'message' => 'An unexpected error occurred'
                ], 500);
            }
        }

        if ($exception instanceof AuthenticationException) {
            return redirect()->guest(route('login'))
                ->with('error', 'Please login to access this page');
        }

        if ($exception instanceof ValidationException) {
            return redirect()->back()
                ->withErrors($exception->errors())
                ->withInput();
        }

        return parent::render($request, $exception);
    }
}