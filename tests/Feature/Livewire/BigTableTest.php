<?php

namespace Standapp\PulseBigTable\Tests\Feature\Livewire;

use Standapp\PulseBigTable\Livewire\BigTable;
use Standapp\PulseBigTable\Tests\TestCase;
use Livewire\Livewire;
use Orchestra\Testbench\Attributes\WithMigration;
use PHPUnit\Framework\Attributes\Test;

#[WithMigration]
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