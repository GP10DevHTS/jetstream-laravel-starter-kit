<x-app-layout>
    <x-slot name="title">
        Spacemens
    </x-slot>
    <x-app.card>
        <x-slot name="banner">
            <div class="flex">
                <div class="flex-1">
                    Spacemens
                </div>
                <div>
                    <x-app.back href="{{ route('spacemens.index') }}" />
                </div>
            </div>
        </x-slot>

        <x-app.flash-message />

        <div>
            <!-- Form -->
            <form method="POST" action="{{ route('spacemens.store') }}">
                @csrf
                <div class="space-y-4">
                    <div class="mb-4">
                        <x-jet-label for="spacemen" value="{{ __('Spacemen') }}" />
                        <x-jet-input class="md:w-2/3" id="spacemen" type="text" name="spacemen" :value="old('spacemen')"
                            autofocus />
                        <x-jet-input-error for="spacemen" />
                    </div>
                </div>

                <div class="flex items-center justify-between mt-6">
                    <x-jet-button class="ml-3">
                        {{ __('Save') }}
                    </x-jet-button>
                </div>
            </form>
            <x-jet-validation-errors class="mt-4" />
        </div>
    </x-app.card>
</x-app-layout>
