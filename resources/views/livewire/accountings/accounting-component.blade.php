<div class="mt-6">
    <div>
        <div class="flex flex-col mt-6">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-800">
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        {{-- <a wire:click.prevent="sortBy('spacemen')" role="button" href="#"
                                            class="flex"> --}}
                                        Patient ID
                                        {{-- @include('partials.sort_icons', [
                                                'field' => 'spacemen',
                                            ])
                                        </a> --}}
                                    </th>

                                    <th scope="col"
                                        class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        {{-- <a wire:click.prevent="sortBy('created_at')" role="button" href="#"
                                            class="flex"> --}}
                                        Full Name
                                        {{-- @include('partials.sort_icons', ['field' => 'created_at'])
                                        </a> --}}
                                    </th>

                                    <th scope="col"
                                        class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        {{-- <a wire:click.prevent="sortBy('created_at')" role="button" href="#"
                                            class="flex"> --}}
                                        Service
                                        {{-- @include('partials.sort_icons', ['field' => 'created_at'])
                                        </a> --}}
                                    </th>

                                    <th scope="col"
                                        class="px-12  py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        {{-- <a wire:click.prevent="sortBy('created_at')" role="button" href="#"
                                            class="flex"> --}}
                                        Total Amount (UGX.)
                                        {{-- @include('partials.sort_icons', ['field' => 'created_at'])
                                        </a> --}}
                                    </th>

                                    <th scope="col" class="relative py-3.5 px-4">
                                        <span class="sr-only">Action</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                @foreach ($patients as $patient)
                                    <tr>
                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                            <div>
                                                {{ $patient->patient_number }}
                                            </div>
                                        </td>

                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                            <div>
                                                {{ $patient->full_name }}
                                            </div>
                                        </td>

                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                            <div>
                                                <ul>
                                                    @foreach ($patient->test_results as $test_result)
                                                        <li class="list-disc border-b">
                                                            {{ $test_result->lab_service->service_name }}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </td>

                                        <td class="px-12 py-4 text-xl font-medium whitespace-nowrap">
                                            <div>
                                                @money($patient->test_results->sum('lab_service_price'))
                                            </div>
                                        </td>


                                        <td class="px-6 py-3 text-center">
                                            <div class="flex justify-center item-center">
                                                @if ($test_result->payment_status == 'unpaid')
                                                    <a href="#" wire:click="openPayBillModal({{ $patient->id }})"
                                                        class="flex items-center justify-center w-1/2 px-5 py-2 mr-2 text-sm tracking-wide text-white transition-colors duration-200 bg-green-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-green-600 dark:hover:bg-green-500 dark:bg-green-600">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                            class="w-4 h-4 bi bi-cash-stack" viewBox="0 0 16 16">
                                                            <path
                                                                d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                                                            <path
                                                                d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2H3z" />
                                                        </svg>
                                                        <span>Pay Bills</span>
                                                    </a>
                                                @elseif($test_result->payment_status == 'paid')
                                                    <a href="{{ route('accountings.print-receipt', $patient) }}"
                                                        class="flex items-center justify-center w-1/2 px-5 py-2 mr-2 text-sm tracking-wide text-white transition-colors duration-200 bg-green-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-green-600 dark:hover:bg-green-500 dark:bg-green-600">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                            class="w-4 h-4 bi bi-printer" viewBox="0 0 16 16">
                                                            <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                                                            <path
                                                                d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z" />
                                                        </svg>
                                                        <span>Print Receipt</span>
                                                    </a>
                                                @endif

                                                <a href="{{ route('accountings.show', $patient) }}"
                                                    class="flex items-center justify-center w-1/2 px-5 py-2 mr-4 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600">
                                                    <svg class="w-4" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                    <span class="pt-1 ml-1 text-xs">View Details</span>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="mt-6 sm:flex sm:items-center sm:justify-between ">
            {{ $patients->links() }}
        </div> --}}
    </div>
    @include('partials.pay-bill-modal');
</div>
