<x-app-layout>
    <x-slot name="title">
        Specimen
    </x-slot>
    <x-app.card>
        <x-slot name="banner">
            Specimen
        </x-slot>
        <x-app.flash-message />
        <div>
            <livewire:spacemen-component />
        </div>
    </x-app.card>
</x-app-layout>
