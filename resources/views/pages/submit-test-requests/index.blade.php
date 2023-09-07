<x-app-layout>
    <x-slot name="title">
        Submit Test Request
    </x-slot>
    <x-app.card>
        <x-slot name="banner">
            Submit Test Request
        </x-slot>
        <x-app.flash-message />
        <div>
            <livewire:submit-test-request-component />
        </div>
    </x-app.card>
</x-app-layout>
