<x-app-layout>
    <x-slot name="title">
        Lab Service
    </x-slot>

    <x-app.flash-message />

    <x-app.card>
        <x-slot name="banner">
            <div class="flex">
                <div class="flex-1">
                    Lab Service
                </div>
                <div>
                    <x-app.back href="{{ route('test-services.index') }}" />
                </div>
            </div>
        </x-slot>
        <div>
            <div class="grid grid-cols-2 mb-4">
                <div class="px-4 py-2 text-base font-bold dark:text-gray-400">
                    Category:
                </div>
                <div class="px-2 py-2 dark:text-gray-400">
                    {{ $test_service->catagory->catagory_name }}
                </div>
            </div>

            <div class="grid grid-cols-2 mb-4">
                <div class="px-4 py-2 text-base font-bold dark:text-gray-400">
                    Test Name:
                </div>
                <div class="px-2 py-2 dark:text-gray-400">
                    {{ $test_service->test_name }}
                </div>
            </div>

            <div class="grid grid-cols-2 mb-4">
                <div class="px-4 py-2 text-base font-bold dark:text-gray-400">
                    Price:
                </div>
                <div class="px-2 py-2 dark:text-gray-400">
                    {{ $test_service->price }}
                </div>
            </div>
        </div>
    </x-app.card>
</x-app-layout>
