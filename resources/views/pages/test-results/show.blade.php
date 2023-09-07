<x-app-layout>
    <x-slot name="title">
        Laboratory Test Report
    </x-slot>

    <x-app.flash-message />

    <x-app.card>
        <x-slot name="banner">
            <div class="flex">
                <div class="flex-1">
                    Laboratory Test Report
                </div>
                <div class="flex">
                    <div>
                        @can('print results')
                            <button href="#" id="print"
                                class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6 bi bi-printer"
                                    viewBox="0 0 16 16">
                                    <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                                    <path
                                        d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z" />
                                </svg>

                                <span>Print Results</span>
                            </button>
                        @endcan
                    </div>
                    <div>
                        <x-app.back href="{{ route('test-results.index') }}" />
                    </div>
                </div>
            </div>
        </x-slot>
        <div id="container" class="bg-white rounded">
            <div class="mt-6">
                <div class="p-3 bg-white rounded-sm shadow-sm">
                    <div>
                        <x-app.print-header />
                        <div class="mt-6 text-lg font-bold text-center underline uppercase">
                            {{ $test_result->lab_service->lab_service_category->category_name }} Laboratory Report
                        </div>
                    </div>
                    <div class="mt-4 text-gray-700 md:flex">
                        <div>
                            <div class="grid grid-cols-2">
                                <div class="px-2 py-2 font-mono font-semibold">Date:</div>
                                <div class="px-1 py-2 font-mono">
                                    {{ $test_result->sample_test_date->format('D, d/M/Y H:s') }}</div>
                            </div>

                            <div class="grid grid-cols-2">
                                <div class="px-2 py-2 font-mono font-semibold">Patient ID</div>
                                <div class="px-2 py-2 font-mono">{{ $test_result->patient->patient_number }}</div>
                            </div>

                            <div class="grid grid-cols-2">
                                <div class="px-2 py-2 font-mono font-semibold">Patient Name</div>
                                <div class="px-2 py-2 font-mono">{{ $test_result->patient->full_name }}</div>
                            </div>

                            <div class="grid grid-cols-2">
                                <div class="px-2 py-2 font-mono font-semibold">Age</div>
                                <div class="px-2 py-2 font-mono">
                                    @if (!is_null($test_result->patient->date_of_birth))
                                        {{ $test_result->patient->ageFromDob() }}
                                        years
                                    @else
                                        @foreach ($test_result->patient->patient_visits as $patient_visit)
                                            @if (!is_null($patient_visit->patient_days))
                                                {{ $patient_visit->patient_days }}
                                                day(s)
                                            @elseif(!is_null($patient_visit->patient_weeks))
                                                {{ $patient_visit->patient_weeks }}week(s)
                                            @elseif(!is_null($patient_visit->patient_months))
                                                {{ $patient_visit->patient_months }}month(s)
                                            @elseif(!is_null($patient_visit->patient_years))
                                                {{ $patient_visit->patient_years }}year(s)
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="grid grid-cols-2">
                                <div class="px-2 py-2 font-mono font-semibold">Sex</div>
                                <div class="px-2 py-2 font-mono">{{ $test_result->patient->gender }}</div>
                            </div>
                        </div>

                        <div>
                            <div class="grid grid-cols-2">
                                <div class="px-2 py-2 font-mono font-semibold">Case/Order #</div>
                                <div class="px-2 py-2 font-mono">{{ $test_result->order_number }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-2 py-2 font-mono font-semibold">Test ID</div>
                                <div class="px-2 py-2 font-mono font-semibold underline decoration-dotted">
                                    {{ $test_result->test_identity }}
                                </div>
                            </div>

                            <div class="grid grid-cols-2">
                                <div class="px-2 py-2 font-mono font-semibold">Sample collected on</div>
                                <div class="px-2 py-2 font-mono">
                                    {{ $test_result->sample_collection_date->format('D, d/M/Y H:s') }}</div>
                            </div>

                            <div class="grid grid-cols-2">
                                <div class="px-2 py-2 font-mono font-semibold">Sample received on</div>
                                <div class="px-2 py-2 font-mono">
                                    {{ $test_result->sample_received_date->format('D, d/M/Y H:s') }}
                                </div>
                            </div>

                            <div class="grid grid-cols-2">
                                <div class="px-2 py-2 font-mono font-semibold">Test done on:</div>
                                <div class="px-2 py-2 font-mono">
                                    {{ $test_result->sample_test_date->format('D, d/M/Y H:s') }}
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="my-16">
                            <div class="overflow-hidden border border-gray-200 dark:border-gray-700">
                                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                    <thead class=" dark:bg-gray-800">
                                        <tr>
                                            <th scope="col"
                                                class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                Temperature
                                            </th>

                                            <th scope="col"
                                                class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                Weight
                                            </th>

                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                Height
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody
                                        class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                        @foreach ($test_result->patient->patient_visits as $visit)
                                            <tr>
                                                <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                    <div>
                                                        {{ $visit->temperature }}&deg;
                                                    </div>
                                                </td>
                                                <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                    <div>
                                                        {{ $visit->weight }} Kg
                                                    </div>
                                                </td>

                                                <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                    <div>
                                                        {{ $visit->height }} cm
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div> --}}

                    <div class="my-6">
                        <div class="overflow-hidden border-gray-200 dark:border-gray-700">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class=" dark:bg-gray-800">
                                    <tr>
                                        <th scope="col"
                                            class="py-3.5 px-4 text-sm font-bold text-left rtl:text-right text-gray-500 dark:text-gray-400 font-mono">
                                            Test Name
                                        </th>

                                        <th scope="col"
                                            class="py-3.5 px-4 text-sm font-bold text-left rtl:text-right text-gray-500 dark:text-gray-400 font-mono">
                                            Results
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                    <tr>
                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                            <div class="font-mono">
                                                {{ $test_result->lab_service->service_name }}
                                            </div>
                                        </td>
                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                            <div class="font-mono">
                                                {{ $test_result->result_option->option }}
                                                ({{ $test_result->result_option->code }})
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="text-sm md:flex">
                        <div class="font-mono font-semibold">
                            Specimen(s)/ Sample used:
                        </div>
                        <div class="ml-4">
                            <ul>
                                @foreach ($test_result->spacemens as $spacemen)
                                    <li class="font-mono list-decimal">
                                        {{ $spacemen->spacemen }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="my-3">
                        <div class="font-mono font-semibold">
                            Interpretation/ comment
                        </div>
                        <div class="font-mono underline">
                            {{ $test_result->comment }}
                        </div>
                    </div>


                    <div class="my-3">
                        <div class="font-mono font-semibold">
                            Test conducted by:
                        </div>
                        <div class="font-mono ">
                            {{ $test_result->staff->name }} ({{ $test_result->staff->email }})
                        </div>
                        <div class="mt-3 font-mono">
                            Sign:..........................................
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app.card>
    @push('scripts')
        <script>
            $('#print').on("click", function() {
                $('#container').printThis({
                    importCSS: true,
                    printDelay: 1,
                    header: null,
                    footer: null,
                    removeScripts: false,
                    copyTagClasses: false

                });
            });
        </script>
    @endpush
</x-app-layout>
