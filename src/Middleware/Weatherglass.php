<?php

namespace JonahGeorge\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class Weatherglass
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        {
            $params = http_build_query([
                'site_id' => Config::get('weatherglass.site_id'),
                'resource' => '',
                'referrer' => $request->header('referer'),
                'title' => '',
                'user_agent' => $request->header('user-agent'),
            ]);

            $url = "https://weatherglass.herokuapp.com/track.gif?" . $params;
            $cmd = "curl -X GET '$url'";

            // if (!$this->debug()) {
                $cmd .= " > /dev/null 2>&1 &";
            // }

            exec($cmd, $output, $exit);
        }

        return $response;
    }
}
