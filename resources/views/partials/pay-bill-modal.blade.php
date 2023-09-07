@if ($isOpenPayBill)
    <x-modal>
        <div>
            <x-slot name="title">
                PAY LABORATORY TEST BILL
            </x-slot>

            <x-slot name="content">
                @if ($errors->any())
                    <x-jet-validation-errors class="mb-4" />
                @endif
                <form>
                    <div class="mb-8">
                        <span class="mr-8 text-xl">
                            Total Amount Due:
                        </span>
                        <span class="text-2xl font-bold">
                            UGX. @money($total_amount_due)
                        </span>
                    </div>
                    <!-- payment_method -->
                    <div class="mt-3 mb-3">
                        <x-jet-label for="service_category_id" value="{{ __('Payment Method *') }}" />
                        <div class="flex">
                            <select
                                class="w-full mb-4 border-gray-300 rounded-md shadow-sm dark:border-gray-900 dark:text-gray-400 dark:bg-gray-700 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 form-select"
                                wire:model="selectedPaymentMethod">
                                <option value="">-- select payment method --</option>
                                @foreach ($payment_methods as $payment_method)
                                    <option value="{{ $payment_method->id }}">
                                        {{ $payment_method->method }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <x-jet-input-error for="selectedPaymentMethod" />
                    </div>
                    <!-- /.payment_method -->

                    <!-- payment_service_provider -->
                    @if (!is_null($selectedPaymentMethod))
                        <div class="mt-3 mb-3">
                            <x-jet-label for="service_category_id" value="{{ __('Payment Service Provider') }}" />
                            <div class="flex">
                                <select
                                    class="w-full mb-4 border-gray-300 rounded-md shadow-sm dark:border-gray-900 dark:text-gray-400 dark:bg-gray-700 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 form-select"
                                    wire:model.defer="payment_service_provider_id">
                                    <option value="">-- select payment method --</option>
                                    @foreach ($payment_service_providers as $payment_service_provider)
                                        <option value="{{ $payment_service_provider->id }}">
                                            {{ $payment_service_provider->provider_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <x-jet-input-error for="payment_service_provider_id" />
                        </div>
                    @endif
                    <!-- /.payment_service_provider -->

                    <!-- paymentAmount -->
                    <div class="space-y-4">
                        <div class="mb-4">
                            <x-jet-label for="paymentAmount" value="{{ __('Amount') }}" />
                            <x-jet-input class="md:w-full" id="paymentAmount" type="number"
                                wire:model.lazy="paymentAmount" autofocus />
                            <x-jet-input-error for="paymentAmount" />
                        </div>
                    </div>
                    <!-- paymentAmount -->
                </form>
            </x-slot>

            <x-slot name="footer">
                <x-jet-button class="mr-4" wire:click="storePayments" wire:loading.attr="disabled">
                    <span>{{ __('Pay Bill') }}</span>
                </x-jet-button>

                <x-jet-secondary-button wire:click="closePayBillModal" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
            </x-slot>
        </div>
    </x-modal>
@endif
