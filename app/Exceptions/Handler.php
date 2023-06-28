<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (\Spatie\Permission\Exceptions\UnauthorizedException $e) {
            return response()->view('errors.403', [
                'title' => 'Forbidden',
                'message' => 'Sorry, you do not have permission to access this page'
            ], 403);
        });

        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
