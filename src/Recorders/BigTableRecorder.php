<?php

namespace StandApp\PulseBigTable\Recorders;

use Illuminate\Config\Repository;
use Illuminate\Support\Facades\DB;
use Laravel\Pulse\Events\SharedBeat;
use Laravel\Pulse\Pulse;

class BigTableRecorder
{
    public string $listen = SharedBeat::class;

    public function __construct(protected Pulse $pulse, protected Repository $config)
    {

    }

    /**
     * @throws \JsonException
     */
    public function record(SharedBeat $event): void
    {
//        if ($event->time !== $event->time->startOfDay()) {
//            return;
//        }

        $tables = DB::table('information_schema.TABLES')
            ->select(
                DB::raw('table_schema as `database_name`'),
                DB::raw('table_name as `table_name`'),
                DB::raw('round(((data_length + index_length) / 1024 / 1024), 2) as `size_in_mb`'),
            )
            ->orderByRaw('(data_length + index_length) DESC')
            ->limit(10)
            ->get();

        $encoded = json_encode($tables);

        // Just make sure it's valid JSON
        json_decode(json: $encoded, associative: true, flags: JSON_THROW_ON_ERROR);

        $this->pulse->set('big-table', 'result', $encoded);
    }
}