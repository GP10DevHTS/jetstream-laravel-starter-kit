<div class="mt-6">
    <div>
        <div class="flex mt-12">
            <div class="flex-1">
                <div class="flex ml-4 text-lg font-semibold uppercase">
                    <div class="mr-3">
                        Patient Name:
                    </div>
                    <div>
                        {{ $patient->full_name }}
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col mt-2">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-800">
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        Order Number
                                    </th>

                                    <th scope="col"
                                        class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        Lab Service
                                    </th>

                                    <th scope="col"
                                        class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        Payment Status
                                    </th>

                                    <th scope="col"
                                        class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        Price (UGX.)
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                @foreach ($patient->test_results as $test_result)
                                    <tr>
                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                            <div>
                                                {{ $test_result->order_number }}
                                            </div>
                                        </td>

                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                            <div>
                                                {{ $test_result->lab_service->service_name }}
                                            </div>
                                        </td>

                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                            @if ($test_result->payment_status == 'unpaid')
                                                <div
                                                    class="inline px-1 text-xs font-normal text-red-500 border border-red-300 rounded gap-x-2 bg-red-100/60 dark:bg-gray-800">
                                                    {{ $test_result->payment_status }}
                                                </div>
                                            @elseif($test_result->payment_status == 'paid')
                                                <div
                                                    class="inline px-1 text-xs font-normal text-green-500 border border-green-300 rounded gap-x-2 bg-green-100/60 dark:bg-gray-800">
                                                    {{ $test_result->payment_status }}
                                                </div>
                                            @endif
                                        </td>

                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                            <div>
                                                @money($test_result->lab_service_price)
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                <tr>
                                    <td class="px-4 py-4 text-sm font-medium whitespace-nowrap"></td>
                                    <td class="px-4 py-4 text-sm font-medium whitespace-nowrap"></td>
                                    <td class="px-4 py-4 text-sm font-bold uppercase whitespace-nowrap">
                                        Total</td>
                                    <td class="py-4 text-sm font-medium uppercase whitespace-nowrap">
                                        <span class="text-xl">
                                            UGX.
                                        </span>
                                        <span class="text-2xl underline decoration-double">
                                            @money($patient->test_results->sum('lab_service_price'))
                                        </span>
                                    </td>
                                </tr>

                            </tbody>
                        </table>

                    </div>
                    <div class="flex mt-2">
                        <div class="flex-1"></div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('partials.pay-bill-modal');
</div>
