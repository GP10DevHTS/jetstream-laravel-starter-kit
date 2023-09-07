<x-app-layout>
    <x-slot name="title">
        Enter Test Results
    </x-slot>

    <x-app.flash-message />

    <x-app.card>
        <x-slot name="banner">
            <div class="flex">
                <div class="flex-1">
                    Enter Test Results
                </div>
                <div>
                    <x-app.back href="{{ route('sample-results.show', $sample_result) }}" />
                </div>
            </div>
        </x-slot>
        <div>
            <!-- Form -->
            <form method="POST" action="{{ route('sample-results.update', $sample_result) }}">
                @csrf
                @method('put')

                <div class="my-10">

                    <!-- full name -->
                    <div class="space-y-4">
                        <div class="mb-4">
                            <x-jet-label for="full_name" value="{{ __('Full Name *') }}" />
                            <x-jet-input class="md:w-2/3" id="full_name" type="text" name="full_name"
                                :value="old('full_name') ?? $sample_result->patient->full_name" />
                        </div>
                    </div>
                    <!-- /.full name -->

                    <!-- date of birth -->
                    <div class="space-y-4">
                        <div class="mb-4">
                            <x-jet-label for="birth_date" value="{{ __('Age') }}" />
                            <x-jet-input class="md:w-2/3" id="birth_date" type="text" name="birth_date"
                                :value="old('birth_date') ?? $sample_result->patient->age" />
                        </div>
                    </div>
                    <!-- /.date of birth -->
                </div>
                <hr />

                <div class="my-10">
                    <!-- temperature -->
                    <div class="space-y-4">
                        <div class="mb-4">
                            <x-jet-label for="temperature" value="{{ __('Temperature') }}" />
                            <x-jet-input class="md:w-2/3" id="temperature" type="text" name="temperature"
                                :value="old('temperature')" autofocus />
                        </div>
                    </div>
                    <!-- /.temperature -->

                    <!-- weight -->
                    <div class="space-y-4">
                        <div class="mb-4">
                            <x-jet-label for="weight" value="{{ __('Weight') }}" />
                            <x-jet-input class="md:w-2/3" id="weight" type="text" name="weight"
                                :value="old('weight')" />
                        </div>
                    </div>
                    <!-- /.weight -->

                    <!-- height -->
                    <div class="space-y-4">
                        <div class="mb-4">
                            <x-jet-label for="height" value="{{ __('height') }}" />
                            <x-jet-input class="md:w-2/3" id="height" type="text" name="height" :value="old('height')"
                                autofocus />
                        </div>
                    </div>
                    <!-- /.height -->
                </div>

                <hr />

                <div class="my-10">
                    <!-- test carried out -->
                    <div class="space-y-4">
                        <div class="mb-4">
                            <x-jet-label for="test_name" value="{{ __('Test carried out') }}" />
                            <x-jet-input class="md:w-2/3" id="test_name" type="text" name="test_name"
                                :value="old('test_name') ?? $sample_result->test_service->test_name" autofocus />
                        </div>
                    </div>
                    <!-- /.test carried -->

                    <!-- spacemen used -->
                    <div class="mt-3 mb-3">
                        <x-jet-label for="spacemen_id" value="{{ __('Spacemen used to carryout test') }}" />
                        <select
                            class="w-2/3 border'sample-results.create'-gray-300 rounded-md shadow-sm dark:border-gray-900 dark:text-gray-400 dark:bg-gray-700 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 form-select"
                            name="spacemen_id">
                            <option value="">-- select spacemen --</option>
                            @foreach ($spacemens as $spacemen)
                                <option value="{{ $spacemen->id }}" {{ old('spacemen_id') ? 'selected' : '' }}>
                                    {{ $spacemen->spacemen }}
                                </option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="spacemen_id" />
                    </div>
                    <!-- /.spacemen used -->

                    <!-- Results obtained -->
                    <div class="mt-3 mb-3">
                        <x-jet-label for="result_id" value="{{ __('Results obtained') }}" />
                        <select
                            class="w-2/3 border-gray-300 rounded-md shadow-sm dark:border-gray-900 dark:text-gray-400 dark:bg-gray-700 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 form-select"
                            name="result_id">
                            <option value="">-- select result --</option>
                            @foreach ($results as $result)
                                <option value="{{ $result->id }}" {{ old('result_id') ? 'selected' : '' }}>
                                    {{ $result->result }} ({{ $result->symbol }})
                                </option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="result_id" />
                    </div>
                    <!-- /.Results obtained -->
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
