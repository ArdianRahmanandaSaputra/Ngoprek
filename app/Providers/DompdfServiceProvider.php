<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Dompdf\Dompdf;

class DompdfServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('dompdf', function () {
            return new Dompdf();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
