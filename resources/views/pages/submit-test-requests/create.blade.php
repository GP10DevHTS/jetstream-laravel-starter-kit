<x-app-layout>
    <x-slot name="title">
        Submit Test Request
    </x-slot>
    <x-app.card>
        <x-slot name="banner">
            <div class="flex">
                <div class="flex-1">
                    Submit Test Request
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
            <form method="POST" action="{{ route('requests.store') }}">
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
                <div class="mt-8">
                    <x-jet-label for="test_service_id" value="{{ __('Test to be carried out *') }}" />
                    <select
                        class="w-2/3 border-gray-300 rounded-md shadow-sm dark:border-gray-900 dark:text-gray-400 dark:bg-gray-700 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 form-select"
                        name="test_service_id">
                        <option value="">-- select test --</option>
                        @foreach ($test_services as $test_service)
                            <option value="{{ $test_service->id }}" {{ old('test_service_id') ? 'selected' : '' }}>
                                {{ $test_service->test_name }} - 
                                ({{ $test_service->catagory->catagory_name }})
                            </option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="test_service_id" />
                </div>
                <!-- /.test carried out -->

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
