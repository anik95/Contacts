<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

// use App\Middleware\JWTAuth;
class ValidToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $id = auth()->user()->id;
        $user = User::find($id );
//$userinfo = UserInfo::where('user_id','=',$user->id)->first();

$payloadable = [
        'id' => $user->id,
        'name' => $user->name,
        'email' => $user->email,
        //'company' => $userinfo->company,
        //'job_position' => $userinfo->job_position,
        //'country' => $userinfo->country,
        //'organization' => $userinfo->organization_id
    ];
    $request->currentUser = $user;
// $token = JWTAuth::fromUser($user,$payloadable);
        return $next($request);
    }
}
