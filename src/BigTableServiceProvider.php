<?php

namespace Standapp\PulseBigTable;

use Illuminate\Support\ServiceProvider;
use Livewire\LivewireManager;
use Standapp\PulseBigTable\Livewire\BigTable;

class BigTableServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'big-table');

        $this->callAfterResolving('livewire', function (LivewireManager $livewire) {
            $livewire->component('big-table', BigTable::class);
        });
    }
}