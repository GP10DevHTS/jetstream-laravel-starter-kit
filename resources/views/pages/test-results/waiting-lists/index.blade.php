<x-app-layout>
    <x-slot name="title">
        Patient to be tested
    </x-slot>
    <x-app.card>
        <x-slot name="banner">
            <div>Patient to be tested</div>
            <div class="mt-4"></div>
            <hr />
            <div class="mt-8"></div>
        </x-slot>
        <x-app.flash-message />
        <div>
            <livewire:waiting-list-component />
        </div>
    </x-app.card>
</x-app-layout>
