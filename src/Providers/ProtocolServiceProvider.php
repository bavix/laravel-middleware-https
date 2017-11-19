<?php

namespace Bavix\Providers;

use Bavix\Middleware\HttpsProtocol;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Http\Kernel;

class ProtocolServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->registerMiddleware(HttpsProtocol::class);
    }


    /**
     * Register the Debugbar Middleware
     *
     * @param  string $middleware
     */
    protected function registerMiddleware($middleware)
    {
        $kernel = $this->app[Kernel::class];
        $kernel->pushMiddleware($middleware);
    }

}
