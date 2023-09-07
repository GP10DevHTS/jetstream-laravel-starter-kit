<x-app-layout>
    <x-slot name="title">
        Patient's Results
    </x-slot>
    <x-app.card>
        <x-slot name="banner">
            Test Results
        </x-slot>
        <x-app.flash-message />
        <div>
            <livewire:laboratory.test-result-component />
        </div>
    </x-app.card>

</x-app-layout>
