<x-app-layout>
    <x-slot name="title">
        Catagories
    </x-slot>

    <x-app.flash-message />

    <x-app.card>
        <x-slot name="banner">
            <div class="flex">
                <div class="flex-1">
                    Category
                </div>
                <div>
                    <x-app.back href="{{ route('catagories.index') }}" />
                </div>
            </div>
        </x-slot>
        <div>
            <div class="grid grid-cols-2 mb-4">
                <div class="px-4 py-2 text-base font-bold dark:text-gray-400">
                    Category:
                </div>
                <div class="px-2 py-2 dark:text-gray-400">
                    {{ $category->catagory_name }}
                </div>
            </div>

            <div class="grid grid-cols-2 mb-4">
                <div class="px-4 py-2 text-base font-bold dark:text-gray-400">
                    Description:
                </div>
                <div class="px-2 py-2 dark:text-gray-400">
                    {{ $category->description }}
                </div>
            </div>
        </div>
    </x-app.card>
</x-app-layout>
