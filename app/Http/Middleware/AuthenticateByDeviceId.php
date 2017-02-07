<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class AuthenticateByDeviceId
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($device_id = $request->header('device-id')) {
            $user = User::firstOrCreate(['device_id' => $device_id],
                ['device_id' => $device_id, 'name' => 'not_filled', 'email' => 'not_filled', 'password' => 'password']);
            $user = User::findOrFail($user->id);
            Auth::login($user);
        }else{
            throw new BadRequestHttpException('you should send device_id in your request headers');
        }
        return $next($request);
    }
}
