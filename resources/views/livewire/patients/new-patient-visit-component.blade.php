<div>
    <!-- test order -->
    <div>
        <header class="flex items-center px-6 pt-4 mt-4 overflow-hidden gap-x-3">
            <div class="grid flex-1 gap-y-1">
                <h3 class="text-base font-semibold leading-6 fi-section-header-heading text-gray-950 dark:text-white">
                    Test Orders
                </h3>
            </div>

            <div>
                @can('add new visit')
                    <button wire:click="openCreateNewVisitModal"
                        class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>

                        <span>New Visit</span>
                    </button>
                @endcan
            </div>

            <div>
                @can('add test order')
                    <button wire:click="openCreateTestOrderModal"
                        class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>

                        <span>New test order</span>
                    </button>
                @endcan
            </div>
        </header>


        <div class="flex flex-col mt-2">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-800">
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">

                                        Lab Service
                                    </th>
                                    <th scope="col"
                                        class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        Price (UGX.)
                                    </th>
                                    <th scope="col"
                                        class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        Order Number

                                    </th>

                                    <th scope="col"
                                        class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        Order Status
                                    </th>


                                    <th scope="col"
                                        class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        Visit Date
                                    </th>

                                    <th scope="col"
                                        class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        Payment Status
                                    </th>

                                    <th scope="col" class="relative py-3.5 px-4">
                                        <span class="sr-only">Action</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                @foreach ($test_results as $test_result)
                                    <tr>
                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                            <div>
                                                {{ $test_result->lab_service->service_name }}
                                            </div>
                                        </td>
                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                            <div>
                                                @money($test_result->lab_service->price)
                                            </div>
                                        </td>
                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                            <div>
                                                {{ $test_result->order_number }}
                                            </div>
                                        </td>
                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                            @if ($test_result->order_status === 'submitted')
                                                <div
                                                    class="inline px-1 text-xs font-normal text-yellow-500 border border-yellow-300 rounded gap-x-2 bg-yellow-100/60 dark:bg-gray-800">
                                                    {{ $test_result->order_status }}
                                                </div>
                                            @elseif($test_result->order_status === 'received')
                                                <div
                                                    class="inline px-1 text-xs font-normal text-blue-500 border border-blue-300 rounded gap-x-2 bg-blue-100/60 dark:bg-gray-800">
                                                    {{ $test_result->order_status }}
                                                </div>
                                            @endif
                                        </td>


                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                            <div class="px-2 py-1 text-sm font-medium whitespace-nowrap">
                                                {{ $test_result->created_at->format('D, d M Y | h:ia') }}
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


                                        <td class="px-6 py-3 text-center">
                                            <div class="flex justify-center item-center">
                                                <!-- edit -->
                                                @can('edit test order')
                                                    <a wire:click.prevent="openEditModal({{ $test_result->id }})"
                                                        href="#"
                                                        class="flex px-2 mr-2 text-sm text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">
                                                        <svg class="w-4" xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                        </svg>
                                                        <span class="pt-1 ml-1 text-xs">Edit</span>
                                                    </a>
                                                @endcan


                                                <!-- delete -->
                                                @can('delete test order')
                                                    {{-- <button wire:click.prevent="openDeleteModal({{ $test_result->id }})"
                                                    type="button"
                                                    class="flex px-2 text-sm text-white bg-red-500 rounded hover:bg-red-700 focus:outline-none focus:shadow-outline">
                                                    <svg class="w-4 pt-1" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                    <span class="pt-1 ml-1 text-xs">Delete</span>
                                                </button> --}}
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div
                            class="flex flex-col items-center px-5 py-5 bg-white border-t xs:flex-row xs:justify-between ">
                            <div class="inline-flex mt-2 xs:mt-0">
                                {{ $test_results->links() }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- test order -->

    <!-- next of kin -->
    <div>
        <header class="flex items-center px-6 pt-4 mt-4 overflow-hidden gap-x-3">
            <div class="grid flex-1 gap-y-1">
                <h3 class="text-base font-semibold leading-6 fi-section-header-heading text-gray-950 dark:text-white">
                    Next of kin
                </h3>
            </div>
        </header>
        <div class="flex flex-col mt-2">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-800">
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">

                                        Full Name
                                    </th>
                                    <th scope="col"
                                        class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        Gender
                                    </th>
                                    <th scope="col"
                                        class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        Relationship to Patient

                                    </th>

                                    <th scope="col"
                                        class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        Phone Number
                                    </th>

                                    <th scope="col"
                                        class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        Residence
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                @foreach ($patient->patient_visits as $patient_visit)
                                    <tr>
                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                            <div>
                                                {{ $patient_visit->kin_full_name }}
                                            </div>
                                        </td>
                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                            <div>
                                                {{ $patient_visit->kin_gender }}
                                            </div>
                                        </td>
                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                            <div>
                                                {{ $patient_visit->patient_relation }}
                                            </div>
                                        </td>
                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                            <div>
                                                {{ $patient_visit->kin_phone_number }}
                                            </div>
                                        </td>
                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                            <div>
                                                {{ $patient_visit->kin_residence }}
                                            </div>
                                        </td>


                                        {{-- <td class="px-6 py-3 text-center">
                                            <div class="flex justify-center item-center">
                                                <!-- view-->
                                                <a href="{{ route('patients.show', $patient) }}"
                                                    class="flex px-2 mr-2 text-sm text-white bg-green-500 rounded hover:bg-green-700 focus:outline-none focus:shadow-outline">
                                                    <svg class="w-4" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                    <span class="pt-1 ml-1 text-xs">View</span>
                                                </a>

                                                <!-- edit -->
                                                <a wire:click.prevent="openEditModal({{ $patient->id }})"
                                                    href="#"
                                                    class="flex px-2 mr-2 text-sm text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">
                                                    <svg class="w-4" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                    </svg>
                                                    <span class="pt-1 ml-1 text-xs">Edit</span>
                                                </a>


                                                <!-- delete -->
                                                <button wire:click.prevent="openDeleteModal({{ $patient->id }})"
                                                    type="button"
                                                    class="flex px-2 text-sm text-white bg-red-500 rounded hover:bg-red-700 focus:outline-none focus:shadow-outline">
                                                    <svg class="w-4 pt-1" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                    <span class="pt-1 ml-1 text-xs">Delete</span>
                                                </button>
                                            </div>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--next of kin -->

    @include('partials.new-patient-visit-modal')
</div>
