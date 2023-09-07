<!-- /receive patient modal -->
@if ($isOpenAddSpacemen)
    <x-modal>
        <form>
            <x-slot name="title">
                Add Spacemen
            </x-slot>

            <x-slot name="content">
                <div class="mb-4">
                    <!-- hidden field-->
                    <input type="hidden" wire:model="test_result_id">
                    <!-- spacemen -->
                    <div>
                        <div class="flex mb-1">
                            <div>
                                <select
                                    class="border-gray-300 rounded-md shadow-sm dark:border-gray-900 dark:text-gray-400 dark:bg-gray-700 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 form-select"
                                    wire:model.defer="spacemen.0">
                                    <option value="">-- select spacemen --</option>
                                    @foreach ($spacemens as $spacemen)
                                        <option value="{{ $spacemen->spacemen }}">
                                            {{ $spacemen->spacemen }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <x-jet-button class="block ml-2" wire:click.prevent="add({{ $i }})">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-4 h-4 bi bi-plus"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                </svg>
                            </x-jet-button>
                        </div>
                        <x-jet-input-error for="spacemen.0" />
                    </div>
                    <!-- /.lab service -->
                    @foreach ($inputs as $key => $value)
                        <!-- lab service -->
                        <div>
                            <div class="flex mb-1">
                                <select
                                    class="border-gray-300 rounded-md shadow-sm dark:border-gray-900 dark:text-gray-400 dark:bg-gray-700 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 form-select"
                                    wire:model.lazy="spacemen.{{ $value }}">
                                    <option value="">-- select spacemen --</option>
                                    @foreach ($spacemens as $spacemen)
                                        <option value="{{ $spacemen->spacemen }}">
                                            {{ $spacemen->spacemen }}
                                        </option>
                                    @endforeach
                                </select>

                                <x-jet-secondary-button class="block ml-2"
                                    wire:click.prevent="remove({{ $key }})">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>
                                </x-jet-secondary-button>
                            </div>
                            <x-jet-input-error for="spacemen.*" />
                        </div>
                    @endforeach
                    <!-- /.lab service -->
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-button class="mr-2" wire:click.prevent="addSpacemen({{ $test_result }})"
                    wire:loading.attr="disabled">
                    Add Spacemen
                </x-jet-button>

                <x-jet-secondary-button wire:click.prevent="closeAddSpacemen" wire:loading.attr="disabled">
                    Cancel
                </x-jet-secondary-button>
            </x-slot>
        </form>
    </x-modal>
@endif
<!-- /.receive patient modal -->
