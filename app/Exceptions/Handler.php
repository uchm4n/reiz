<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Log;
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
        $this->reportable(function (Throwable $e) {
            //
        });
    }


    /**
     * Modify exception logging. Log without massive trace messages
     * @param Throwable $e
     * @return void
     */
    public function report(\Throwable $e)
    {
        // new compact Exception logging format
        $exceptionFormat = "Class: %s | Message: %s | FILE: %s -> L:%s ";
        Log::error(
            sprintf(
                $exceptionFormat,
                get_class($e),
                $e->getMessage(),
                $e->getFile(),
                $e->getLine()
            )
        );
    }
}
