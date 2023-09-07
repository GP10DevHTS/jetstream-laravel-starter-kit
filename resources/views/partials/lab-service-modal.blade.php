<!-- create modal -->
@if ($isOpenCreate)
    <x-modal>
        <div>
            <x-slot name="title">
                Create Lab Service
            </x-slot>

            <x-slot name="content">
                <div class="mb-2">
                    <span class="font-semibold">Note: </span><span class="mr-1 text-lg"> *</span> Denotes Mandatory.
                </div>

                @if ($errors->any())
                    <x-jet-validation-errors class="mb-4" />
                @endif
                <form>
                    <!-- category -->
                    <div class="mt-3 mb-3">
                        <x-jet-label for="service_category_id" value="{{ __('Service Category *') }}" />
                        <div class="flex">
                            <select
                                class="w-full mb-4 border-gray-300 rounded-md shadow-sm dark:border-gray-900 dark:text-gray-400 dark:bg-gray-700 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 form-select"
                                wire:model.defer="lab_service_category_id">
                                <option value="">-- select category --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('service_category_id') ? 'selected' : '' }}>
                                        {{ $category->category_name }}
                                    </option>
                                @endforeach
                            </select>

                            {{-- <x-jet-button class="block mb-4 ml-2" wire:click.prevent="newCategoryModal">
                                <span>New category</span>
                            </x-jet-button> --}}
                        </div>
                        <x-jet-input-error for="lab_service_category_id" />
                    </div>
                    <!-- /.category -->

                    <!-- service name -->
                    <div class="space-y-4">
                        <div class="mb-4">
                            <x-jet-label for="service_name" value="{{ __('Service Name *') }}" />
                            <x-jet-input class="md:w-full" id="service_name" type="text"
                                wire:model.defer="service_name" autofocus />
                            <x-jet-input-error for="service_name" />
                        </div>
                    </div>
                    <!-- service name -->

                    <!-- result option -->
                    <div class="">
                        <x-jet-label for="result_option_id" value="{{ __('Result Options *') }}" />
                        <div>
                            <div class="flex">
                                <select
                                    class="w-full mb-4 border-gray-300 rounded-md shadow-sm dark:border-gray-900 dark:text-gray-400 dark:bg-gray-700 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 form-select"
                                    wire:model.defer="result_option_id.0">
                                    <option value="">-- select options --</option>
                                    @foreach ($result_options as $result_option)
                                        <option value="{{ $result_option->id }}">
                                            {{ $result_option->option }}
                                        </option>
                                    @endforeach
                                </select>

                                <x-jet-button class="block mb-4 ml-2" wire:click.prevent="add({{ $i }})">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="w-4 h-4 bi bi-plus" viewBox="0 0 16 16">
                                        <path
                                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                    </svg>
                                </x-jet-button>
                            </div>
                            <x-jet-input-error for="result_option_id.0" />
                        </div>
                        <!-- /.lab service -->
                        @foreach ($inputs as $key => $value)
                            <!-- lab service -->
                            <div>
                                <div>
                                    <div class="flex mb-1">
                                        <select
                                            class="w-full mb-4 border-gray-300 rounded-md shadow-sm dark:border-gray-900 dark:text-gray-400 dark:bg-gray-700 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 form-select"
                                            wire:model.defer="result_option_id.{{ $value }}">
                                            <option value="">-- select options --</option>
                                            @foreach ($result_options as $result_option)
                                                <option value="{{ $result_option->id }}">
                                                    {{ $result_option->option }}
                                                </option>
                                            @endforeach
                                        </select>

                                        <x-jet-secondary-button class="block mb-4 ml-2"
                                            wire:click.prevent="remove({{ $key }})">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                        </x-jet-secondary-button>
                                    </div>
                                </div>
                                <x-jet-input-error for="result_option_id.*" />
                            </div>
                        @endforeach
                        <!-- /.lab service -->
                    </div>

                    <!-- price -->
                    <div class="space-y-4">
                        <div class="mb-4">
                            <x-jet-label for="price" value="{{ __('Price *') }}" />
                            <x-jet-input class="md:w-full" id="price" type="text" wire:model.defer="price" />
                            <x-jet-input-error for="price" />
                        </div>
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
                Edit Lab Service
            </x-slot>

            <x-slot name="content">
                <form>
                    <!-- hidden field-->
                    <input type="hidden" wire:model="lab_service_id">
                    <!-- category -->
                    <div class="mt-3 mb-3">
                        <x-jet-label for="service_category_id" value="{{ __('Service Category') }}" />
                        <select
                            class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-900 dark:text-gray-400 dark:bg-gray-700 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 form-select"
                            wire:model.defer="lab_service_category_id">
                            <option value="">-- select category --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('service_category_id') ? 'selected' : '' }}>
                                    {{ $category->category_name }}
                                </option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="lab_service_category_id" />
                    </div>
                    <!-- /.category -->

                    <!-- test name -->
                    <div class="space-y-4">
                        <div class="mb-4">
                            <x-jet-label for="service_name" value="{{ __('Service Name') }}" />
                            <x-jet-input class="md:w-full" id="service_name" type="text"
                                wire:model.defer="service_name" :value="old('service_name')" autofocus />
                            <x-jet-input-error for="service_name" />
                        </div>
                    </div>
                    <!-- test name -->

                    <!-- price -->
                    <div class="space-y-4">
                        <div class="mb-4">
                            <x-jet-label for="price" value="{{ __('Price') }}" />
                            <x-jet-input class="md:w-full" id="price" type="text" wire:model.defer="price"
                                :value="old('price')" autofocus />
                            <x-jet-input-error for="price" />
                        </div>
                    </div>
                </form>
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
                    Delete Lab service
                </div>
                <div class="text-center">
                    Are you sure you want to do this?
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-danger-button class="mr-2" wire:click.prevent="delete({{ $lab_service }})"
                wire:loading.attr="disabled">
                Delete Service
            </x-jet-danger-button>

            <x-jet-secondary-button wire:click.prevent="closeDelete" wire:loading.attr="disabled">
                Cancel
            </x-jet-secondary-button>
        </x-slot>
    </x-delete-modal>
@endif
<!-- /.delete modal -->


<!-- create new category -->
@if ($isOpenNewCategory)
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
                        <label for="category_name"
                            class="text-sm font-bold leading-tight tracking-normal text-gray-800">
                            Service Category *
                        </label>
                        <input id="category_name "
                            class="flex items-center w-full h-10 pl-3 mt-2 mb-1 text-sm font-normal text-gray-600 border border-gray-300 rounded focus:outline-none focus:border focus:border-indigo-700"
                            wire:model.defer="category_name" />
                        <x-jet-input-error for="category_name" />
                    </div>
                </form>
            </x-slot>

            <x-slot name="footer">
                <x-jet-button class="mr-4" wire:click="storeServiceCategory" wire:loading.attr="disabled">
                    {{ __('Save') }}
                </x-jet-button>

                <x-jet-secondary-button wire:click="closeNewCategoryModal" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
            </x-slot>
        </div>
    </x-modal>
@endif
<!-- create new category -->
