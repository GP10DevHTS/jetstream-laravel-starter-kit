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
                    <x-app.back href="{{ route('test-services.show', $test_service) }}" />
                </div>
            </div>
        </x-slot>
        <div>
            <!-- Form -->
            <form method="POST" action="{{ route('test-services.update', $test_service) }}">
                @csrf
                @method('put')

                <!-- category -->
                <div class="mt-3 mb-3">
                    <x-jet-label for="catagory_id" value="{{ __('Category') }}" />
                    <select
                        class="w-2/3 border-gray-300 rounded-md shadow-sm dark:border-gray-900 dark:text-gray-400 dark:bg-gray-700 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 form-select"
                        name="catagory_id">
                        <option value="">-- select category --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @selected(old('catagory_id', $category->id) == $test_service->catagory->id)>
                                {{ $category->catagory_name }}
                            </option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="catagory_id" />
                </div>
                <!-- /.category -->

                <div class="space-y-4">
                    <div class="mb-4">
                        <x-jet-label for="test_name" value="{{ __('Test Name') }}" />
                        <x-jet-input class="md:w-2/3" id="test_name" type="text" name="test_name" :value="old('test_name') ?? $test_service->test_name"
                            autofocus />
                        <x-jet-input-error for="residence" />
                    </div>
                </div>

                <div class="space-y-4">
                    <div class="mb-4">
                        <x-jet-label for="price" value="{{ __('Price') }}" />
                        <x-jet-input class="md:w-2/3" id="price" type="text" name="price" :value="old('price') ?? $test_service->price"
                            autofocus />
                    </div>
                </div>

                <div class="flex items-center justify-between mt-6">
                    <x-jet-button class="ml-3">
                        {{ __('Update') }}
                    </x-jet-button>
                </div>
            </form>
            <x-jet-validation-errors class="mt-4" />
        </div>
    </x-app.card>
</x-app-layout>
