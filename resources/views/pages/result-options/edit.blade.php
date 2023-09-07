<x-app-layout>
    <x-slot name="title">
        Results
    </x-slot>

    <x-app.flash-message />

    <x-app.card>
        <x-slot name="banner">
            <div class="flex">
                <div class="flex-1">
                    Results
                </div>
                <div>
                    <x-app.back href="{{ route('results.show', $result) }}" />
                </div>
            </div>
        </x-slot>

        <x-app.flash-message />

        <div>
            <!-- Form -->
            <form method="POST" action="{{ route('results.update', $result) }}">
                @csrf
                @method('put')

                <!-- result -->
                <div class="space-y-4">
                    <div class="mb-4">
                        <x-jet-label for="result" value="{{ __('Result *') }}" />
                        <x-jet-input class="md:w-2/3" id="result" type="text" name="result" :value="old('result') ?? $result->result"
                            autofocus />
                        <x-jet-input-error for="result" />
                    </div>
                </div>
                <!-- /.result -->

                <!-- code -->
                <div class="space-y-4">
                    <div class="mb-4">
                        <x-jet-label for="code" value="{{ __('Code*') }}" />
                        <x-jet-input class="md:w-2/3" id="code" type="text" name="code" :value="old('code') ?? $result->code"
                            autofocus />
                        <x-jet-input-error for="code" />
                    </div>
                </div>
                <!-- /.code -->

                <!-- symbol -->
                <div class="space-y-4">
                    <div class="mb-4">
                        <x-jet-label for="symbol" value="{{ __('Symbol *') }}" />
                        <x-jet-input class="md:w-2/3" id="symbol" type="text" name="symbol" :value="old('symbol') ?? $result->symbol"
                            autofocus />
                        <x-jet-input-error for="symbol" />
                    </div>
                </div>
                <!-- /.symbol -->

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
