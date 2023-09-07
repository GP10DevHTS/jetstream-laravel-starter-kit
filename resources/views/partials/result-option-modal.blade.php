<!-- create modal -->
@if ($isOpenCreate)
    <x-modal>
        <div>
            <x-slot name="title">
                Enter Result Option
            </x-slot>

            <x-slot name="content">
                <div class="mb-2">
                    <span class="font-semibold">Note: </span><span class="mr-1 text-lg"> *</span> Denotes Mandatory.
                </div>
                @if ($errors->any())
                    <x-jet-validation-errors class="mb-4" />
                @endif
                <form>
                    <!-- option -->
                    <div class="space-y-4">
                        <div class="mb-4">
                            <x-jet-label for="option" value="{{ __('Result Option *') }}" />
                            <x-jet-input class="md:w-full" id="option" type="text" wire:model.lazy="option"
                                :value="old('option')" placeholder="(Ex. Positive)" autofocus />
                            <x-jet-input-error for="option" />
                        </div>
                    </div>
                    <!-- option -->

                    <!-- code -->
                    <div class="space-y-4">
                        <div class="mb-4">
                            <x-jet-label for="code" value="{{ __('Code *') }}" />
                            <x-jet-input class="md:w-full" id="code" type="text" wire:model.lazy="code"
                                :value="old('code')" placeholder="(Ex. POSITIVE)" autofocus />
                            <x-jet-input-error for="code" />
                        </div>
                    </div>
                    <!-- code -->

                    <!-- symbol -->
                    <div class="space-y-4">
                        <div class="mb-4">
                            <x-jet-label for="symbol" value="{{ __('Symbol *') }}" />
                            <x-jet-input class="md:w-full" id="symbol" type="text" wire:model.lazy="symbol"
                                :value="old('symbol')" placeholder="(Ex. +)" autofocus />
                            <x-jet-input-error for="symbol" />
                        </div>
                    </div>
                    <!-- result -->
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
                Edit Result Option
            </x-slot>

            <x-slot name="content">
                <div>
                    <div class="mb-2">
                        <span class="font-semibold">Note: </span><span class="mr-1 text-lg"> *</span> Denotes Mandatory.
                    </div>
                    <form>
                        <!-- hidden field-->
                        <input type="hidden" wire:model="spacemen_id">

                        <!-- option -->
                        <div class="space-y-4">
                            <div class="mb-4">
                                <x-jet-label for="option" value="{{ __('Result Option *') }}" />
                                <x-jet-input class="md:w-full" id="option" type="text" wire:model.lazy="option"
                                    :value="old('option')" placeholder="(Ex. Positive)" autofocus />
                                <x-jet-input-error for="option" />
                            </div>
                        </div>
                        <!-- option -->

                        <!-- code -->
                        <div class="space-y-4">
                            <div class="mb-4">
                                <x-jet-label for="code" value="{{ __('Code *') }}" />
                                <x-jet-input class="md:w-full" id="code" type="text" wire:model.lazy="code"
                                    :value="old('code')" placeholder="(Ex. POSITIVE)" autofocus />
                                <x-jet-input-error for="code" />
                            </div>
                        </div>
                        <!-- code -->

                        <!-- symbol -->
                        <div class="space-y-4">
                            <div class="mb-4">
                                <x-jet-label for="symbol" value="{{ __('Symbol *') }}" />
                                <x-jet-input id="symbol" type="text" wire:model.lazy="symbol" :value="old('symbol')"
                                    placeholder="(Ex. +)" autofocus />
                                <x-jet-input-error for="symbol" />
                            </div>
                        </div>
                        <!-- result -->
                    </form>
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-button class="mr-4" wire:click="update" wire:loading.attr="disabled">
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
                    Delete Result Option
                </div>
                <div class="text-center">
                    Are you sure you want to do this?
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-danger-button class="mr-2" wire:click.prevent="delete({{ $result_option }})"
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
