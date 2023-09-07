<x-app-layout>
    <x-slot name="title">
        Spacemens
    </x-slot>

    <x-app.flash-message />

    <x-app.card>
        <x-slot name="banner">
            <div class="flex">
                <div class="flex-1">
                    Spacemens
                </div>
                <div>
                    <x-app.back href="{{ route('spacemens.show', $spacemen) }}" />
                </div>
            </div>
        </x-slot>
        <div>
            <!-- Form -->
            <form method="POST" action="{{ route('spacemens.update', $spacemen) }}">
                @csrf
                @method('put')

                <div class="space-y-4">
                    <div class="mb-4">
                        <x-jet-label for="spacemen" value="{{ __('Test Name') }}" />
                        <x-jet-input class="md:w-2/3" id="spacemen" type="text" name="spacemen" :value="old('spacemen') ?? $spacemen->spacemen"
                            autofocus />
                        <x-jet-input-error for="spacemen" />
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
