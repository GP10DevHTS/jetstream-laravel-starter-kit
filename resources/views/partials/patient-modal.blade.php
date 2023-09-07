<!-- edit-->
@if ($isOpenEdit)
    <x-modal>
        <div>
            <x-slot name="title">
                Edit Patient
            </x-slot>

            <x-slot name="content">
                <form>
                    <!-- hidden field-->
                    <input type="hidden" wire:model="patient_id">

                    <!-- full_name -->
                    <div class="space-y-4">
                        <div class="mb-4">
                            <x-jet-label for="full_name" value="{{ __('Full Name') }}" />
                            <x-jet-input class="md:w-full" id="full_name" type="text" wire:model.defer="full_name" />
                            <x-jet-input-error for="full_name" />
                        </div>
                    </div>
                    <!-- full_name -->

                    <!-- gender -->
                    <div class="space-y-4">
                        <div class="mb-4">
                            <span class="text-gray-700 dark:text-gray-400">Gender *</span>
                            <div class="mt-2">
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio dark:bg-gray-700" wire:model.defer="gender" name="gender" value="Male">
                                    <span class="ml-2 dark:text-gray-500">Male</span>
                                </label>
                                <label class="inline-flex items-center ml-6">
                                    <input type="radio" class="form-radio dark:bg-gray-700" wire:model.defer="gender" name="gender" value="Female">
                                    <span class="ml-2 dark:text-gray-500">Female</span>
                                </label>
                            </div>
                            <x-jet-input-error for="gender" />
                        </div>
                    </div>
                    <!-- /.gender -->


                    <!-- phone_number -->
                    <div class="space-y-4">
                        <div class="mb-4">
                            <x-jet-label for="phone_number" value="{{ __('Phone Number') }}" />
                            <x-jet-input class="md:w-full" id="phone_number" type="text" wire:model.defer="phone_number" />

                            <x-jet-input-error for="phone_number" />
                        </div>
                    </div>
                    <!-- phone_number -->

                    <!-- email -->
                    <div class="space-y-4">
                        <div class="mb-4">
                            <x-jet-label for="email" value="{{ __('Email') }}" />
                            <x-jet-input class="md:w-full" id="email" type="text" wire:model.defer="email"
                                :value="old('email')" autofocus />
                            <x-jet-input-error for="email" />
                        </div>
                    </div>
                    <!-- email -->

                    <!-- residence -->
                    <div class="space-y-4">
                        <div class="mb-4">
                            <x-jet-label for="residence" value="{{ __('Residence') }}" />
                            <x-jet-input class="md:w-full" id="residence" type="text" wire:model.defer="residence"
                                :value="old('residence')" autofocus />
                            <x-jet-input-error for="residence" />
                        </div>
                    </div>
                    <!-- residence -->
                </form>
            </x-slot>

            <x-slot name="footer">
                <x-jet-button class="mr-4" wire:click="update" wire:loading.attr="disabled">
                    <span wire:loading.remove wire.target="save">{{ __('Update') }}</span>
                    <span wire:loading wire.target="save">{{ __('Updating...') }}</span>

                </x-jet-button>

                <x-jet-secondary-button wire:click="closeEdit" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
            </x-slot>
        </div>
    </x-modal>
@endif
<!-- /.edit-->


<!-- /delete modal -->
@if ($isOpenDelete)
    <x-delete-modal>
        <x-slot name="content">
            <div class="mb-4">
                <div class="mb-2 text-lg font-bold text-center">
                    Delete Patient
                </div>
                <div class="text-center">
                    Are you sure you want to do this?
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-danger-button class="mr-2" wire:click.prevent="delete({{ $patient }})"
                wire:loading.attr="disabled">
                Delete Patient
            </x-jet-danger-button>

            <x-jet-secondary-button wire:click.prevent="closeDelete" wire:loading.attr="disabled">
                Cancel
            </x-jet-secondary-button>
        </x-slot>
    </x-delete-modal>
@endif
<!-- /.delete modal -->
