<x-app-layout>
    <x-slot name="title">
        Results
    </x-slot>

    <x-app.flash-message />

    <x-app.card>
        <x-slot name="banner">
            <div class="flex">
                <div class="flex-1">
                    Results
                </div>
                <div>
                    <x-app.back href="{{ route('results.index') }}" />
                </div>
            </div>
        </x-slot>

        <x-app.flash-message />

        <div>
            <div class="grid grid-cols-2 mb-4">
                <div class="px-4 py-2 text-base font-bold dark:text-gray-400">
                    Test Result:
                </div>
                <div class="px-2 py-2 dark:text-gray-400">
                    {{ $result->result }}
                </div>
            </div>

            <div class="grid grid-cols-2 mb-4">
                <div class="px-4 py-2 text-base font-bold dark:text-gray-400">
                    Code:
                </div>
                <div class="px-2 py-2 dark:text-gray-400">
                    {{ $result->code }}
                </div>
            </div>

            <div class="grid grid-cols-2 mb-4">
                <div class="px-4 py-2 text-base font-bold dark:text-gray-400">
                    Symbol
                </div>
                <div class="px-2 py-2 dark:text-gray-400">
                    {{ $result->symbol }}
                </div>
            </div>
        </div>
    </x-app.card>
</x-app-layout>
