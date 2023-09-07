<x-app-layout>
    <x-slot name="title">
        Patients
    </x-slot>
    <x-app.card>
        <x-slot name="banner">
            <div class="flex">
                <div class="flex-1">
                    Patient
                </div>
                <div>
                    <x-app.back href="{{ route('patients.index') }}" />
                </div>
            </div>
        </x-slot>
        <x-app.flash-message />
        <div>
            <livewire:patients.create-patient-component />
        </div>
    </x-app.card>
</x-app-layout>
