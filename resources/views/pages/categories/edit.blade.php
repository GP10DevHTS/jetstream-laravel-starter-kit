<x-app-layout>
    <x-slot name="title">
        Categories
    </x-slot>

    <x-app.flash-message />

    <x-app.card>
        <x-slot name="banner">
            <div class="flex">
                <div class="flex-1">
                    Categories
                </div>
                <div>
                    <x-app.back href="{{ route('catagories.show', $category) }}" />
                </div>
            </div>
        </x-slot>
        <x-app.flash-message />
        <div>
            <!-- Form -->
            <form method="POST" action="{{ route('catagories.update', $category) }}">
                @csrf
                @method('put')

                <div class="space-y-4">
                    <div class="mb-4">
                        <x-jet-label for="category" value="{{ __('Category') }}" />
                        <x-jet-input class="md:w-2/3" id="category" type="category" name="catagory_name"
                            :value="old('category') ?? $category->catagory_name" autofocus />
                        <x-jet-input-error for="catagory_name" />
                    </div>
                </div>

                <div>
                    <x-jet-label for="description" value="{{ __('Description') }}" />
                    <x-app.text id="description" class="block w-full mt-1 md:w-2/3" :value="old('description')"
                        name="description">
                        {{ old('description', $category->description) }}
                    </x-app.text>
                    <x-jet-input-error for="description" />
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
