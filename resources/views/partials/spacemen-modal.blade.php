<!-- create modal -->
@if ($isOpenCreate)
    <x-modal>
        <div>
            <x-slot name="title">
                Create Specimen
            </x-slot>

            <x-slot name="content">
                @if ($errors->any())
                    <x-jet-validation-errors class="mb-4" />
                @endif
                <form>
                    <!-- spacemen -->
                    <div class="space-y-4">
                        <div class="mb-4">
                            <x-jet-label for="spacemen" value="{{ __('Specimen') }}" />
                            <x-jet-input class="md:w-full" id="spacemen" type="text" wire:model.lazy="spacemen"
                                autofocus />
                            <x-jet-input-error for="spacemen" />
                        </div>
                    </div>
                    <!-- spacemen -->
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
                Edit Specimen
            </x-slot>

            <x-slot name="content">
                <form>
                    <!-- hidden field-->
                    <input type="hidden" wire:model="spacemen_id">

                    <!-- spacemen -->
                    <div class="space-y-4">
                        <div class="mb-4">
                            <x-jet-label for="spacemen" value="{{ __('Specimen') }}" />
                            <x-jet-input class="md:w-full" id="spacemen" type="text" wire:model.lazy="spacemen"
                                :value="old('spacemen')" autofocus />
                            <x-jet-input-error for="spacemen" />
                        </div>
                    </div>
                    <!-- spacemen -->
                </form>
            </x-slot>

            <x-slot name="footer">
                <x-jet-button class="mr-4" wire:click="update" wire:loading.attr="disabled">
                    {{ __('Update') }}
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
                    Delete Spacemen
                </div>
                <div class="text-center">
                    Are you sure you want to do this?
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-danger-button class="mr-2" wire:click.prevent="delete({{ $spacemen }})"
                wire:loading.attr="disabled">
                Delete Spacemen
            </x-jet-danger-button>

            <x-jet-secondary-button wire:click.prevent="closeDelete" wire:loading.attr="disabled">
                Cancel
            </x-jet-secondary-button>
        </x-slot>
    </x-delete-modal>
@endif
<!-- /.delete modal -->
