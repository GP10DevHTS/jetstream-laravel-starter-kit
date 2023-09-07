<!-- /receive patient modal -->
@if ($isOpenAddTestResult)
    <x-modal>
        <form>
            <x-slot name="title">
                Add Results
            </x-slot>

            <x-slot name="content">
                <form>
                    <!-- hidden field-->
                    <input type="hidden" wire:model="test_result_id">

                    <!-- result option id -->
                    <div class="mt-3 mb-3">
                        <x-jet-label for="result_option_id" value="{{ __('Result *') }}" />
                        <select
                            class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-900 dark:text-gray-400 dark:bg-gray-700 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 form-select"
                            wire:model.lazy="result_option_id">
                            <option value="">-- select result --</option>
                            @foreach ($result_options as $result_option)
                                <option value="{{ $result_option->id }}" {{ old('result_option_id') ? 'selected' : '' }}>
                                    {{ $result_option->option }}
                                </option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="result_option_id" />
                    </div>
                    <!-- /.result option id -->

                    <!-- user id -->
                    <div class="mt-3 mb-3">
                        <x-jet-label for="lab_technician_id" value="{{ __('Lab Technician *') }}" />
                        <select
                            class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-900 dark:text-gray-400 dark:bg-gray-700 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 form-select"
                            wire:model.lazy="lab_technician_id">
                            <option value="">-- select lab technician --</option>
                            @foreach ($role->users as $user)
                                <option value="{{ $user->id }}">
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="lab_technician_id" />
                    </div>
                    <!-- /.user id -->

                    <!-- comment -->
                    <div class="mb-4">
                        <label for="email2" class="text-sm font-bold leading-tight tracking-normal text-gray-800">
                            Comment
                        </label>
                        <x-app.text id="comment" class="block mt-1 " :value="old('comment')" wire:model.lazy="comment"
                            rows="6">
                            {{ old('comment') }}
                        </x-app.text>
                        <x-jet-input-error for="comment" />
                    </div>
                    <!-- /.comment -->
                </form>
            </x-slot>

            <x-slot name="footer">
                <x-jet-button class="mr-2" wire:click.prevent="addTestResult({{ $test_result }})"
                    wire:loading.attr="disabled">
                    Add Result
                </x-jet-button>

                <x-jet-secondary-button wire:click.prevent="openCloseTestResult" wire:loading.attr="disabled">
                    Cancel
                </x-jet-secondary-button>
            </x-slot>
        </form>
    </x-modal>
@endif
<!-- /.receive patient modal -->
