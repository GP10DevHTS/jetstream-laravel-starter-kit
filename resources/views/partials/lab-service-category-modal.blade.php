<!-- create modal -->
@if ($isOpenCreate)
    <x-modal>
        <div>
            <x-slot name="title">
                Enter Service Category
            </x-slot>

            <x-slot name="content">
                <div class="mb-2">
                    <span class="font-semibold">Note: </span><span class="mr-1 text-lg"> *</span> Denotes Mandatory.
                </div>
                @if ($errors->any())
                    <x-jet-validation-errors class="mb-4" />
                @endif
                <form>
                    <div>
                        <label for="category_name" class="text-sm font-bold leading-tight tracking-normal text-gray-800">
                            Service Category *
                        </label>
                        <input id="category_name "
                            class="flex items-center w-full h-10 pl-3 mt-2 mb-1 text-sm font-normal text-gray-600 border border-gray-300 rounded focus:outline-none focus:border focus:border-indigo-700"
                            wire:model.lazy="category_name" />
                        <x-jet-input-error for="category_name" />
                    </div>
                </form>
            </x-slot>

            <x-slot name="footer">
                <x-jet-button class="mr-4" wire:click="store" wire:loading.attr="disabled">
                    <span wire:loading.remove>{{ __('Save') }}</span>
                    <span wire:loading>{{ __('Saving...') }}</span>
                </x-jet-button>

                <x-jet-button class="mr-4" wire:click="storeCreateAnother" wire:loading.attr="disabled">
                    <span wire:loading.remove>{{ __('Save & Create another') }}</span>
                    <span wire:loading>{{ __('Saving...') }}</span>
                </x-jet-button>

                <x-jet-secondary-button wire:click="closeModal" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
            </x-slot>
        </div>
    </x-modal>
@endif
<!-- /.create modal -->

<!-- edit-->
@if ($isOpenEdit)
    <x-modal>
        <div>
            <x-slot name="title">
                Edit Service Category
            </x-slot>

            <x-slot name="content">
                <div class="mb-2">
                    <span class="font-semibold">Note: </span><span class="mr-1 text-lg"> *</span> Denotes Mandatory.
                </div>
                <form>
                    <!-- hidden field-->
                    <input type="hidden" wire:model="category_id">

                    <!-- category name-->
                    <div>
                        <label for="category_name"
                            class="text-sm font-bold leading-tight tracking-normal text-gray-800">
                            Service Category *
                        </label>
                        <input id="category_name"
                            class="flex items-center w-full h-10 pl-3 mt-2 mb-1 text-sm font-normal text-gray-600 border border-gray-300 rounded focus:outline-none focus:border focus:border-indigo-700"
                            wire:model.lazy="category_name" />
                        <x-jet-input-error for="category_name" />
                    </div>
                </form>
            </x-slot>

            <x-slot name="footer">
                <x-jet-button class="mr-4" wire:click="updatePatient" wire:loading.attr="disabled">
                    <span wire:loading.remove>{{ __('Update') }}</span>
                    <span wire:loading>{{ __('Updating...') }}</span>
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
                    Delete Lab service category
                </div>
                <div class="text-center">
                    Are you sure you want to do this?
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-danger-button class="mr-2" wire:click.prevent="delete({{ $lab_service_category }})"
                wire:loading.attr="disabled">
                Delete
            </x-jet-danger-button>

            <x-jet-secondary-button wire:click.prevent="closeDelete" wire:loading.attr="disabled">
                Cancel
            </x-jet-secondary-button>
        </x-slot>
    </x-delete-modal>
@endif
<!-- /.delete modal -->
