<?php

namespace Standapp\PulseBigTable\Livewire;

use Laravel\Pulse\Facades\Pulse;
use Laravel\Pulse\Livewire\Card;
use Livewire\Attributes\Lazy;
use Illuminate\Support\Facades\View;

class BigTable extends Card
{
    /**
     * @throws \JsonException
     */

    #[Lazy]
    public function render()
    {
        $tables = (array)Pulse::values('big-table', ['result'])->first();

        // Decode the JSON and throw an exception if it's invalid
        $tables = !empty($tables) ? json_decode($tables['value'], true, flags: JSON_THROW_ON_ERROR) : [];

        return View::make('big-table::livewire.big-table', compact('tables'));
    }
}