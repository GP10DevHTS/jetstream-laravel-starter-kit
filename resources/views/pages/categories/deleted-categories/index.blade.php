<x-app-layout>
    <x-slot name="title">
        Categories
    </x-slot>
    <x-app.card>
        <x-slot name="banner">
            <div class="mb-8">
                Deleted Lab Services Categories
            </div>
        </x-slot>
        <x-app.flash-message />
        <div>
            <livewire:deleted-categories-component>
        </div>
    </x-app.card>
</x-app-layout>
