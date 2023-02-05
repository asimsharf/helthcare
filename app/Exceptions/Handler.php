<?php

namespace App\Exceptions;

use App\Helpers\Helpers;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Symfony\Component\CssSelector\Exception\InternalErrorException;
use \Illuminate\Database\QueryException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
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
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(function (UnauthorizedException $e, $request) {
            $error = [
                'details' => $e->getMessage(),
            ];
            return Helpers::failedResponse($error, 'Unauthorized Exception.', 403);
        });

        $this->reportable(function (Throwable $e) {
            $error = [
                'details' => $e->getMessage()
            ];
            return Helpers::failedResponse($error, 'Throwable.', 500);
        });
    }

    public function render($request, Throwable $e)
    {
        if ($e instanceof AuthenticationException) {
            $error = [
                'details' => $e->getMessage(),
            ];
            return Helpers::failedResponse($error, 'Authentication Exception.', 401);
        }

        if ($e instanceof ModelNotFoundException) {
            $error = [
                'details' => 'Entry for ' . str_replace('App', '', [$e->getModel()]) . ' not found.'
            ];
            return Helpers::failedResponse($error, 'Model Not Found Exception.', 404);
        }

        if ($e instanceof InternalErrorException) {
            $error = [
                'details' => $e->getMessage()
            ];
            return Helpers::failedResponse($error, 'Internal Error Exception.', 500);
        }

        if ($e instanceof ValidationException) {
            $error = [
                'details' => $e->errors()
            ];
            return Helpers::failedResponse($error, 'Validation Exception.', 422);
        }

        if ($e instanceof QueryException) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {
                $error = [
                    'details' => 'The ' . explode('\'', $e->errorInfo[2])[1] . ' has already been taken.'
                ];
                return Helpers::failedResponse($error, 'Query Exception.', 409);
            }

            if ($errorCode == 1451) {
                $error = [
                    'details' => 'The ' . explode('\'', $e->errorInfo[2])[1] . ' is currently in use.'
                ];
                return Helpers::failedResponse($error, 'Query Exception.', 409);
            }

            if ($errorCode == 1452) {
                $error = [
                    'details' => 'The ' . explode('\'', $e->errorInfo[2])[1] . ' does not exist.'
                ];
                return Helpers::failedResponse($error, 'Query Exception.', 409);
            }

            if ($errorCode == 1364) {
                $error = [
                    'details' => 'The ' . explode('\'', $e->errorInfo[2])[1] . ' is required.'
                ];
                return Helpers::failedResponse($error, 'Query Exception.', 409);
            }

            $error = [
                'details' => $e->getMessage()
            ];

            return Helpers::failedResponse($error, 'Unknown Exception.', 500);
        }

        if ($e instanceof \Exception) {
            $error = [
                'details' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ];
            return Helpers::failedResponse($error, 'Exception.', 500);
        }


        if ($e instanceof \Error) {
            $error = [
                'details' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ];
            return Helpers::failedResponse($error, 'Error.', 500);
        }

        if ($e instanceof \Throwable) {
            $error = [
                'details' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ];
            return Helpers::failedResponse($error, 'Throwable.', 500);
        }

        if ($e instanceof \ErrorException) {
            $error = [
                'details' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ];
            return Helpers::failedResponse($error, 'Error Exception.', 500);
        }

        if ($e instanceof \ParseError) {
            $error = [
                'details' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ];
            return Helpers::failedResponse($error, 'Parse Error.', 500);
        }

        if ($e instanceof \TypeError) {
            $error = [
                'details' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ];
            return Helpers::failedResponse($error, 'Type Error.', 500);
        }

        if ($e instanceof \ArgumentCountError) {
            $error = [
                'details' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ];
            return Helpers::failedResponse($error, 'Argument Count Error.', 500);
        }

        if ($e instanceof \DivisionByZeroError) {
            $error = [
                'details' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ];
            return Helpers::failedResponse($error, 'Division By Zero Error.', 500);
        }

        if ($e instanceof \AssertionError) {
            $error = [
                'details' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ];
            return Helpers::failedResponse($error, 'Assertion Error.', 500);
        }

        if ($e instanceof \ArithmeticError) {
            $error = [
                'details' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ];
            return Helpers::failedResponse($error, 'Arithmetic Error.', 500);
        }

        if ($e instanceof \CompileError) {
            $error = [
                'details' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ];
            return Helpers::failedResponse($error, 'Compile Error.', 500);
        }

        return parent::render($request, $e);
    }
}
