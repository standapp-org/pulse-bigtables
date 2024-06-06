<x-pulse::card :cols="$cols" :rows="$rows" :class="$class">
    <x-pulse::card-header name="Big tables">
        <x-slot:icons>
            <x-dynamic-component :component="'pulse::icons.information-circle'"/>
        </x-slot:icons>
    </x-pulse::card-header>

    <x-pulse::scroll :expand="$expand" wire:poll.5s="">
        @if (!count($tables))
            <x-pulse::no-results/>
        @else
            <div class="@lg:grid-cols-3 @3xl:grid-cols-3 @6xl:grid-cols-4 grid grid-cols-1 gap-2">
                <x-pulse::table>
                    <colgroup>
                        <col width="100%"/>
                        <col width="0%"/>
                        <col width="0%"/>
                    </colgroup>
                    <x-pulse::thead>
                        <tr>
                            <x-pulse::th>Database</x-pulse::th>
                            <x-pulse::th class="text-center">Table</x-pulse::th>
                            <x-pulse::th class="text-center">Size</x-pulse::th>
                        </tr>
                    </x-pulse::thead>
                    <tbody>
                    @foreach ($tables as $table)
                        <tr class="h-2 first:h-0"></tr>
                        <tr wire:key="{{ $table['database_name'] }}">
                            <x-pulse::td class="max-w-[1px]">
                                <code class="block truncate text-xs text-gray-900 dark:text-gray-100" title="">
                                    {{ $table['database_name'] }}
                                </code>
                            </x-pulse::td>
                            <x-pulse::td class="text-center">
                                <code class="block truncate text-xs text-gray-900 dark:text-gray-100" title="">
                                    {{ $table['table_name'] }}
                                </code>
                            </x-pulse::td>
                            <x-pulse::td numeric class="font-bold text-gray-700 dark:text-gray-300">
                                <code class="block truncate text-xs text-gray-900 dark:text-gray-100" title="">
                                    {{ $table['size_in_mb'] }} MB
                                </code>
                            </x-pulse::td>
                        </tr>
                    @endforeach
                    </tbody>
                </x-pulse::table>
            </div>
        @endif
    </x-pulse::scroll>
</x-pulse::card>