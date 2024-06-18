<?php

namespace StandApp\PulseBigTable\Tests\Feature\Livewire;

use StandApp\PulseBigTable\Livewire\BigTable;
use StandApp\PulseBigTable\Tests\TestCase;
use Livewire\Livewire;
use PHPUnit\Framework\Attributes\Test;

class BigTableTest extends TestCase
{
    #[Test]
    public function it_can_set_card_props()
    {
        Livewire::test(BigTable::class, ['cols' => 4, 'rows' => 2])
            ->assertSet('cols', 4)
            ->assertSet('rows', 2);
    }
}