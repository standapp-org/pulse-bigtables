<?php

namespace StandApp\PulseBigTable;

use Illuminate\Support\ServiceProvider;
use Livewire\LivewireManager;
use StandApp\PulseBigTable\Livewire\BigTable;

class BigTableServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'big-table');

        $this->publishes([
            __DIR__ . '/../config/pulse-bigtable.php' => config_path('pulse-bigtable.php'),
        ], 'pulse-bigtable');

        $this->mergeConfigFrom(
            __DIR__ . '/../config/pulse-bigtable.php', 'pulse-bigtable'
        );

        $this->callAfterResolving('livewire', function (LivewireManager $livewire) {
            $livewire->component('big-table', BigTable::class);
        });
    }
}