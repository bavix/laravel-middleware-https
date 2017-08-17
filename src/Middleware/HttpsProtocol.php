<?php

namespace Bavix\Middleware;

use Closure;
use Illuminate\Http\Request;

class HttpsProtocol
{

    /**
     * Automatic redirect on cloudFlare
     *
     * @param Request $request
     * @param Closure $next
     *
     * @return \Illuminate\Http\RedirectResponse|mixed
     *
     * @throws \InvalidArgumentException
     */
    public function handle(Request $request, Closure $next)
    {
        $request::setTrustedProxies([$request->getClientIp()]);

        if (config('redirect.https', false) && !$request->secure())
        {
            return redirect()->secure($request->getRequestUri());
        }

        return $next($request);
    }

}
