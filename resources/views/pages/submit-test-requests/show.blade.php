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
                    <x-app.back href="{{ route('patients.index') }}" />
                </div>
            </div>
        </x-slot>
        <div>
            <div class="grid grid-cols-2 mb-4">
                <div class="px-4 py-2 text-base font-bold dark:text-gray-400">
                    Full Name:
                </div>
                <div class="px-2 py-2 dark:text-gray-400">
                    {{ $patient->full_name }}
                </div>
            </div>

            <div class="grid grid-cols-2 mb-4">
                <div class="px-4 py-2 text-base font-bold dark:text-gray-400">
                    Gender:
                </div>
                <div class="px-2 py-2 dark:text-gray-400">
                    {{ $patient->gender }}
                </div>
            </div>

            <div class="grid grid-cols-2 mb-4">
                <div class="px-4 py-2 text-base font-bold dark:text-gray-400">
                    Date of birth:
                </div>
                <div class="px-2 py-2 dark:text-gray-400">
                    {{ $patient->birth_date->format('d/M/Y') }}
                </div>
            </div>

            <div class="grid grid-cols-2 mb-4">
                <div class="px-4 py-2 text-base font-bold dark:text-gray-400">
                    Phone Number:
                </div>
                <div class="px-2 py-2 dark:text-gray-400">
                    {{ $patient->phone_number }}
                </div>
            </div>

            <div class="grid grid-cols-2 mb-4">
                <div class="px-4 py-2 text-base font-bold dark:text-gray-400">
                    Resident:
                </div>
                <div class="px-2 py-2 dark:text-gray-400">
                    {{ $patient->residence }}
                </div>
            </div>
        </div>
    </x-app.card>
</x-app-layout>
