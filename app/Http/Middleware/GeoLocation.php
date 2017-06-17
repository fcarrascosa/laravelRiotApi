<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cookie;
use Torann\GeoIP\Facades\GeoIP;

class GeoLocation
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
        $ip = $request->ip();
        if ($request->ip() == '127.0.0.1') {
            $ip = '148.56.141.182';
        }

        $location = GeoIP::getLocation($ip);
        if (isset($location)) {
            Cookie::queue('geolocation', $location->getAttribute('iso_code'),'3600');
            $request->attributes->add(['geolocation' => (array) $location]);
        } else {
            Cookie::queue('geolocation', 'US','3600');
        }


        return $next($request);
    }
}
