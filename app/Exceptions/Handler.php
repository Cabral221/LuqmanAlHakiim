<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Support\Arr;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
    * A list of the exception types that are not reported.
    *
    * @var array
    */
    protected $dontReport = [
        //
    ];
    
    /**
    * A list of the inputs that are never flashed for validation exceptions.
    *
    * @var array
    */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];
    
    /**
    * Report or log an exception.
    *
    * @param  \Throwable  $exception
    * @return void
    */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }
    
    /**
    * Render an exception into an HTTP response.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Throwable  $exception
    * @return \Illuminate\Http\Response
    */
    public function render($request, Throwable $exception)
    {
        $class = get_class($exception);
        // dd($exception->guards());
        switch($class) {
            case 'Illuminate\Auth\AuthenticationException':
                $guard = Arr::get($exception->guards(), 0);
                // dd($guard);
                switch ($guard) {
                    case 'admin':
                        $login = 'login-admin';
                        break;
                    default:
                        $login = 'member';
                break;
            }
            
            return redirect()->route($login);
        }
        
        return parent::render($request, $exception);
    }
    
}
