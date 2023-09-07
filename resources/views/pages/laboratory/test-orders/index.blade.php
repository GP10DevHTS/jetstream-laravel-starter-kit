<x-app-layout>
    <x-slot name="title">
        Test Orders
    </x-slot>
    <x-app.card>
        <x-slot name="banner">
            Test Orders
        </x-slot>
        <x-app.flash-message />
        <div>
            <livewire:laboratory.test-order-component />
        </div>
    </x-app.card>
</x-app-layout>
