<form wire:submit.prevent="updatePatient">
    <x-jet-validation-errors class="mt-4" />
    <div class="grid grid-cols-2 gap-8">
        <div>
            <!-- full name -->
            <div class="space-y-4">
                <div class="mb-4">
                    <x-jet-label for="full_name" value="{{ __('Full Name *') }}" />
                    <x-jet-input class="block mt-1" id="full_name" type="text" wire:model.lazy="full_name"
                        :value="old('full_name')" autofocus />
                    <x-jet-input-error for="full_name" />
                </div>
            </div>
            <!-- /.full name -->

            <!-- gender -->
            <div class="space-y-4">
                <div class="mb-4">
                    <span class="text-gray-700 dark:text-gray-400">Gender *</span>
                    <div class="mt-2">
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio dark:bg-gray-700" wire:model.lazy="gender"
                                name="gender" value="Male">
                            <span class="ml-2 dark:text-gray-500">Male</span>
                        </label>
                        <label class="inline-flex items-center ml-6">
                            <input type="radio" class="form-radio dark:bg-gray-700" wire:model.lazy="gender"
                                name="gender" value="Female">
                            <span class="ml-2 dark:text-gray-500">Female</span>
                        </label>
                    </div>
                    <x-jet-input-error for="gender" />
                </div>
            </div>
            <!-- /.gender -->

            <!-- age. -->
            <div>
                <x-jet-label for="age" value="{{ __('Age') }}" />
                <div class="mb-3">
                    <input id="age" class="w-full mt-1 text-base form-input" type="number"
                        wire:model.lazy="age" value="" placeholder="Enter age" autocomplete="age" />
                    <x-jet-input-error for="age" />
                </div>
            </div>
            <!-- age. -->
        </div>
        <div>
            <!-- phone number -->
            <div class="space-y-4">
                <div class="mb-4">
                    <x-jet-label for="phone_number" value="{{ __('Phone Number') }}" />
                    <x-jet-input class="block mt-1" id="phone_number" type="text" wire:model.lazy="phone_number"
                        :value="old('phone_number')" autofocus />
                    <x-jet-input-error for="phone_number" />
                </div>
            </div>
            <!-- /.phone number -->

            <!-- email -->
            <div class="space-y-4">
                <div class="mb-4">
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input class="block mt-1" id="email" type="email" wire:model.lazy="email"
                        :value="old('email')" autofocus />
                    <x-jet-input-error for="email" />
                </div>
            </div>
            <!-- /.email -->

            <!-- residence -->
            <div>
                <x-jet-label for="residence" value="{{ __('Residence') }}" />
                <x-app.text id="residence" class="block mt-1 " :value="old('residence')" wire:model.lazy="residence"
                    rows="2">
                    {{ old('residence') }}
                </x-app.text>
                <x-jet-input-error for="residence" />
            </div>
            <!-- /.residence -->
        </div>
    </div>


    <div class="mt-4 space-y-6">
        <div class="mt-5"></div>
        <hr />
        <div class="p-1 mt-1 text-lg font-bold uppercase bg-gray-200">
            Patient's measurement
        </div>
        <div class="grid grid-cols-2 gap-8">
            <div>
                <!-- temperature -->
                <div class="space-y-4">
                    <div class="mb-4">
                        <x-jet-label for="temperature" value="{{ __('Temperature') }}" />
                        <x-jet-input class="block mt-1" id="temperature" type="number" wire:model.lazy="temperature"
                            :value="old('temperature')" autofocus />
                        <x-jet-input-error for="temperature" />
                    </div>
                </div>
                <!-- /.temperature -->

                <!-- weight -->
                <div class="space-y-4">
                    <div class="mb-4">
                        <x-jet-label for="weight" value="{{ __('Weight') }}" />
                        <x-jet-input class="block mt-1" id="weight" type="number" wire:model.lazy="weight"
                            :value="old('weight')" autofocus />
                        <x-jet-input-error for="weight" />
                    </div>
                </div>
                <!-- /.weight -->
            </div>
            <div>
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
        </div>

        <div class="mt-5"></div>
        <hr />
        <div class="p-1 mt-1 text-lg font-bold uppercase bg-gray-200">
            Patient's Next of kin
        </div>

        <!-- next of kin/next_of_kin info-->
        <div class="grid grid-cols-2 gap-8">
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
                            <input type="radio" class="form-radio dark:bg-gray-700" wire:model.lazy="kin_gender"
                                value="Male" {{ old('gender') ? 'checked' : '' }}>
                            <span class="ml-2 dark:text-gray-500">Male</span>
                        </label>
                        <label class="inline-flex items-center ml-6">
                            <input type="radio" class="form-radio dark:bg-gray-700" wire:model.lazy="kin_gender"
                                value="Female" {{ old('gender') ? 'checked' : '' }}>
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

            <!-- email -->
            <div>
                <div class="mb-4">
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input class="block mt-1" id="email" type="email" wire:model.lazy="kin_email"
                        :value="old('email')" autofocus />
                    <x-jet-input-error for="kin_email" />
                </div>
            </div>
            <!-- /.email -->

            <!-- residence -->
            <div>
                <x-jet-label for="residence" value="{{ __('Residence') }}" />
                <x-app.text id="residence" class="block mt-1" :value="old('residence')" wire:model.lazy="kin_residence"
                    rows="2">
                    {{ old('residence') }}
                </x-app.text>
                <x-jet-input-error for="kin_residence" />
            </div>
            <!-- /.residence -->
            <!-- /.next of kin/next_of_kin info-->
        </div>

        <div class="flex items-center justify-between mt-6">
            <x-jet-button class="ml-3" wire:loading.attr="disabled">
                {{ __('Update') }}
            </x-jet-button>
        </div>
    </div>
</form>
