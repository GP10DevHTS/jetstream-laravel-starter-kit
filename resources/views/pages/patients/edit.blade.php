<x-app-layout>
    <x-slot name="title">
        Patient
    </x-slot>

    <x-app.flash-message />

    <x-app.card>
        <x-slot name="banner">
            <div class="flex">
                <div class="flex-1">
                    Patient
                </div>
                <div>
                    <x-app.back href="{{ route('patients.index', $patient) }}" />
                </div>
            </div>
        </x-slot>
        <div>
            <livewire:edit-patient-component>
        </div>
    </x-app.card>
</x-app-layout>
