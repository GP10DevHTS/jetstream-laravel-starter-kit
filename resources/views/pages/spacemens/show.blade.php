<x-app-layout>
    <x-slot name="title">
        Spacemens
    </x-slot>

    <x-app.flash-message />

    <x-app.card>
        <x-slot name="banner">
            <div class="flex">
                <div class="flex-1">
                    Spacemens
                </div>
                <div>
                    <x-app.back href="{{ route('spacemens.index') }}" />
                </div>
            </div>
        </x-slot>
        <div>
            <div class="grid grid-cols-2 mb-4">
                <div class="px-4 py-2 text-base font-bold dark:text-gray-400">
                    Spacemen:
                </div>
                <div class="px-2 py-2 dark:text-gray-400">
                    {{ $spacemen->spacemen }}
                </div>
            </div>
        </div>
    </x-app.card>
</x-app-layout>
