<?php

namespace Workbench\App\Providers;

use Illuminate\Support\ServiceProvider;
use Standapp\PulseBigTable\Recorders\BigTableRecorder;

class WorkbenchServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        config(['pulse.recorders' => [
            BigTableRecorder::class => []
        ]]);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
