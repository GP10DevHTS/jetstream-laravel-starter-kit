<x-app-layout>
    <x-slot name="title">
        Accounting
    </x-slot>
    <x-app.card>
        <x-slot name="banner">
            Accounting
        </x-slot>
        <x-app.flash-message />
        <div>
            <livewire:accountings.show-accounting-details-component :patient="$patient" />
        </div>
    </x-app.card>
</x-app-layout>
