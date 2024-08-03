<?php

namespace App\Http\Middleware;

use App\Data\DefaultPermissions;
use App\Enums\ProfileTypeEnum;
use App\Models\Profile;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GetProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $profile = Profile::find($request->header('Profile'));
        $request->merge(['permissions' => $profile->getPermissions()]);
        $request->merge(['currentProfile' => $profile]);
        $request->merge(['owner' => $profile->user]);
        if (
            ProfileTypeEnum::from($profile->type)->equals(
                ProfileTypeEnum::SELLER_EMPLOYEE(),
                ProfileTypeEnum::SELLER_DRIVER(),
                ProfileTypeEnum::CUSTOMER_EMPLOYEE(),
                ProfileTypeEnum::ADMIN_EMPLOYEE(),
            )
        ) {
            $request->merge(['owner' => $profile->company]);
        }


        return $next($request);
    }
}
