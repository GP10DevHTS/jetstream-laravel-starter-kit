<!-- load test order modal -->
@if ($isOpenCreateTestOrder)
    <x-modal>
        <div>
            <x-slot name="title">
                Create Test Order
            </x-slot>

            <x-slot name="content">
                @if ($errors->any())
                    <x-jet-validation-errors class="mb-4" />
                @endif
                <form>
                    <!-- lab service -->
                    <div class="space-y-4">
                        <div class="mb-4">
                            <x-jet-label for="lab_service_id" value="{{ __('Lab Service') }}" />
                            <select
                                class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-900 dark:text-gray-400 dark:bg-gray-700 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 form-select"
                                wire:model.lazy="lab_service_id">
                                <option value="">-- select service --</option>
                                @foreach ($lab_services as $lab_service)
                                    <option value="{{ $lab_service->id }}">
                                        {{ $lab_service->service_name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-jet-input-error for="lab_service_id" />
                        </div>
                    </div>
                    <!-- lab_service_id -->
                </form>
            </x-slot>

            <x-slot name="footer">
                <x-jet-button class="mr-4" wire:click="storeTestOrder" wire:loading.attr="disabled">
                    {{ __('Save') }}
                </x-jet-button>

                <x-jet-secondary-button wire:click="closeTestOrderModal" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
            </x-slot>
        </div>
    </x-modal>
@endif
<!-- load test order modal -->



<!-- load patient visit modal -->
@if ($isOpenCreateNewVisit)
    <x-modal>
        <div>
            <x-slot name="title">
                Create New Visit
            </x-slot>

            <x-slot name="content">
                @if ($errors->any())
                    <x-jet-validation-errors class="mb-4" />
                @endif
                <form>
                    <!-- lab service -->
                    <div class="space-y-4">
                        <div class="mb-4">
                            <x-jet-label for="lab_service_id" value="{{ __('Lab Service') }}" />
                            <select
                                class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-900 dark:text-gray-400 dark:bg-gray-700 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 form-select"
                                wire:model.lazy="lab_service_id">
                                <option value="">-- select service --</option>
                                @foreach ($lab_services as $lab_service)
                                    <option value="{{ $lab_service->id }}">
                                        {{ $lab_service->service_name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-jet-input-error for="lab_service_id" />
                        </div>
                    </div>

                    <!-- lab_service_id -->
                    <div class="mt-3"></div>
                    <hr />
                    <div class="mb-3"></div>

                    <div class="flex">
                        <div class="mr-4">
                            <!-- temperature -->
                            <div class="space-y-4">
                                <div class="mb-4">
                                    <x-jet-label for="temperature" value="{{ __('Temperature') }}" />
                                    <x-jet-input class="block mt-1" id="temperature" type="number"
                                        wire:model.lazy="temperature" :value="old('temperature')" autofocus />
                                    <x-jet-input-error for="temperature" />
                                </div>
                            </div>
                            <!-- /.temperature -->

                            <!-- weight -->
                            <div class="space-y-4">
                                <div class="mb-4">
                                    <x-jet-label for="weight" value="{{ __('Weight') }}" />
                                    <x-jet-input class="block mt-1" id="weight" type="number"
                                        wire:model.lazy="weight" :value="old('weight')" autofocus />
                                    <x-jet-input-error for="weight" />
                                </div>
                            </div>
                            <!-- /.weight -->

                        </div>

                        <!-- height -->
                        <div class="space-y-4">
                            <div class="mb-4">
                                <x-jet-label for="height" value="{{ __('Height') }}" />
                                <x-jet-input class="block mt-1" id="height" type="number" wire:model.lazy="height"
                                    :value="old('height')" autofocus />
                                <x-jet-input-error for="height" />
                            </div>
                        </div>
                        <!-- /.height -->
                    </div>

                    <div class="mt-3"></div>
                    <hr />
                    <div class="mb-3"></div>

                    <div class="flex">
                        <div class="mr-4">
                            <!-- full name -->
                            <div>
                                <div class="mb-4">
                                    <x-jet-label for="full_name" value="{{ __('Full Name *') }}" />
                                    <x-jet-input class="block w-full mt-1" id="full_name" type="text"
                                        wire:model.lazy="kin_full_name" :value="old('full_name')" autofocus />
                                    <x-jet-input-error for="kin_full_name" />
                                </div>
                            </div>
                            <!-- /.full name -->

                            <!-- gender -->
                            <div>
                                <div class="mb-4">
                                    <span class="text-gray-700 dark:text-gray-400">Gender *</span>
                                    <div class="mt-2">
                                        <label class="inline-flex items-center">
                                            <input type="radio" class="form-radio dark:bg-gray-700"
                                                wire:model.lazy="kin_gender" value="Male"
                                                {{ old('gender') ? 'checked' : '' }}>
                                            <span class="ml-2 dark:text-gray-500">Male</span>
                                        </label>
                                        <label class="inline-flex items-center ml-6">
                                            <input type="radio" class="form-radio dark:bg-gray-700"
                                                wire:model.lazy="kin_gender" value="Female"
                                                {{ old('gender') ? 'checked' : '' }}>
                                            <span class="ml-2 dark:text-gray-500">Female</span>
                                        </label>
                                    </div>
                                    <x-jet-input-error for="kin_gender" />
                                </div>
                            </div>
                            <!-- /.gender -->

                            <!-- relationship to the patient -->
                            <div>
                                <div class="mb-4">
                                    <x-jet-label for="patient_relation"
                                        value="{{ __('What is the relationship to the patient') }}" />
                                    <x-jet-input class="block mt-1" id="patient_relation" type="text"
                                        wire:model.lazy="patient_relation" :value="old('patient_relation')" autofocus />
                                    <x-jet-input-error for="patient_relation" />
                                </div>
                            </div>
                            <!-- /.relationship to the patient -->
                        </div>

                        <div>
                            <!-- phone number -->
                            <div>
                                <div class="mb-4">
                                    <x-jet-label for="phone_number" value="{{ __('Phone Number') }}" />
                                    <x-jet-input class="block w-2/3 mt-1" id="phone_number" type="text"
                                        wire:model.lazy="kin_phone_number" :value="old('phone_number')" autofocus />
                                    <x-jet-input-error for="kin_phone_number" />
                                </div>
                            </div>
                            <!-- /.phone number -->

                            <!-- residence -->
                            <div>
                                <x-jet-label for="residence" value="{{ __('Residence') }}" />
                                <x-app.text id="residence" class="block mt-1" :value="old('residence')"
                                    wire:model.lazy="kin_residence" rows="2">
                                    {{ old('residence') }}
                                </x-app.text>
                                <x-jet-input-error for="kin_residence" />
                            </div>
                            <!-- /.residence -->
                        </div>
                    </div>
                </form>
            </x-slot>

            <x-slot name="footer">
                <x-jet-button class="mr-4" wire:click="storeNewVisit" wire:loading.attr="disabled">
                    {{ __('Save') }}
                </x-jet-button>

                <x-jet-secondary-button wire:click="closeNewVisitModal" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
            </x-slot>
        </div>
    </x-modal>
@endif
<!-- load patient visit modal -->

@if ($isOpenEditService)
    <x-modal>
        <x-slot name="title">
            Edit order
        </x-slot>

        <x-slot name="content">
            <form>
                <!-- hidden field-->
                <input type="hidden" wire:model="test_result_id">

                <!-- lab service -->
                <div class="space-y-4">
                    <div class="mb-4">
                        <x-jet-label for="lab_service_id" value="{{ __('Lab Service') }}" />
                        <select
                            class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-900 dark:text-gray-400 dark:bg-gray-700 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 form-select"
                            wire:model.lazy="lab_service_id">
                            <option value="">-- select service --</option>
                            @foreach ($lab_services as $lab_service)
                                <option value="{{ $lab_service->id }}">
                                    {{ $lab_service->service_name }}
                                </option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="lab_service_id" />
                    </div>
                </div>
                <!-- lab_service_id -->
            </form>
        </x-slot>

        <x-slot name="footer">
            <x-jet-button class="mr-4" wire:click="updateTestResult" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-jet-button>

            <x-jet-secondary-button wire:click="closeTestResult" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-modal>
@endif

@if ($isOpenDeleteService)
    <x-delete-modal>
        <x-slot name="content">
            <div class="mb-4">
                <div class="mb-2 text-lg font-bold text-center">
                    Delete test order
                </div>
                <div class="text-center">
                    Are you sure you want to do this?
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-danger-button class="mr-2" wire:click.prevent="deleteTestResult({{ $test_result }})"
                wire:loading.attr="disabled">
                Delete order
            </x-jet-danger-button>

            <x-jet-secondary-button wire:click.prevent="closeTestResultDelete" wire:loading.attr="disabled">
                Cancel
            </x-jet-secondary-button>
        </x-slot>
    </x-delete-modal>
@endif
