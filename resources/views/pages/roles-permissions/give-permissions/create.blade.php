<x-app-layout>
    <x-slot:title>

    </x-slot:title>
    <x-app.card>
        <x-slot name="banner">
            <div class="flex">
                <div class="flex-1">
                    Roles
                </div>
                <div>
                    <x-app.back href="{{ route('roles.index') }}" />
                </div>
            </div>
        </x-slot>
        <x-app.flash-message />
        <div>
            <livewire:give-permissions-to-role-component>
        </div>
        </x-card>
        </x-master>
