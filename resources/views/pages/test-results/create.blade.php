<x-app-layout>
    <x-slot name="title">
        Patient's Results
    </x-slot>
    <x-app.card>
        <x-slot name="banner">
            <div class="flex">
                <div class="flex-1">
                    Patient's Results
                </div>
                <div>
                    <x-app.back href="{{ route('sample-results.index') }}" />
                </div>
            </div>
        </x-slot>
        <x-app.flash-message />
        <div>
            <div class="space-y-4">
                <div class="mb-4">
                    <div>Note: </div>
                    <div>
                        <span class="mr-1 text-lg">*</span> Denotes Mandatory.
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form method="POST" action="{{ route('sample-results.store') }}">
                @csrf
                <!-- full name -->
                <div class="mt-8">
                    <x-jet-label for="patient_id" value="{{ __('Full Name *') }}" />
                    <select
                        class="w-2/3 border-gray-300 rounded-md shadow-sm dark:border-gray-900 dark:text-gray-400 dark:bg-gray-700 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 form-select"
                        name="patient_id">
                        <option value="">-- select patient --</option>
                        @foreach ($patients as $patient)
                            <option value="{{ $patient->id }}" {{ old('patient_id') ? 'selected' : '' }}>
                                {{ $patient->full_name }}
                            </option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="patient_id" />
                </div>
                <!-- /.full name -->

                <!-- test carried out -->
                <div class="mt-3 mb-3">
                    <x-jet-label for="class" value="{{ __('Test carried out') }}" />
                    <select
                        class="w-2/3 border-gray-300 rounded-md shadow-sm dark:border-gray-900 dark:text-gray-400 dark:bg-gray-700 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 form-select"
                        name="test_service_id">
                        <option value="">-- select class --</option>
                        {{-- @foreach ($classrooms as $classroom)
                                        <option value="{{ $classroom->id }}" {{ old('class_id') ? 'selected' : '' }}>
                                            {{ $classroom->class_room }}
                                            </option>
                                    @endforeach --}}
                    </select>
                    <x-jet-input-error for="class_id" />
                </div>
                <!-- /.test carried out -->

                <!-- spacemen used -->
                <div class="mt-3 mb-3">
                    <x-jet-label for="class" value="{{ __('Spacemen used to carryout test') }}" />
                    <select
                        class="w-2/3 border-gray-300 rounded-md shadow-sm dark:border-gray-900 dark:text-gray-400 dark:bg-gray-700 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 form-select"
                        name="test_service_id">
                        <option value="">-- select class --</option>
                        {{-- @foreach ($classrooms as $classroom)
                                        <option value="{{ $classroom->id }}" {{ old('class_id') ? 'selected' : '' }}>
                                            {{ $classroom->class_room }}
                                            </option>
                                    @endforeach --}}
                    </select>
                    <x-jet-input-error for="test_service_id" />
                </div>
                <!-- /.spacemen used -->

                <!-- Results obtained -->
                <div class="mt-3 mb-3">
                    <x-jet-label for="test_service_id" value="{{ __('Results obtained') }}" />
                    <select
                        class="w-2/3 border-gray-300 rounded-md shadow-sm dark:border-gray-900 dark:text-gray-400 dark:bg-gray-700 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 form-select"
                        name="test_service_id">
                        <option value="">-- select test --</option>
                        {{-- @foreach ($classrooms as $classroom)
                                        <option value="{{ $classroom->id }}" {{ old('class_id') ? 'selected' : '' }}>
                                            {{ $classroom->class_room }}
                                            </option>
                                    @endforeach --}}
                    </select>
                    <x-jet-input-error for="test_service_id" />
                </div>
                <!-- /.Results obtained -->

                <div class="flex items-center justify-between mt-6">
                    <x-jet-button class="ml-3">
                        {{ __('Submit') }}
                    </x-jet-button>
                </div>
            </form>
            <x-jet-validation-errors class="mt-4" />
        </div>
    </x-app.card>
</x-app-layout>
