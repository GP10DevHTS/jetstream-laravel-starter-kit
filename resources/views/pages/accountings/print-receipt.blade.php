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

                                <span>Print Receipt</span>
                            </button>
                        @endcan
                    </div>
                    <div>
                        <x-app.back href="{{ route('accountings.index') }}" />
                    </div>
                </div>
            </div>
        </x-slot>
        <div id="container" class="bg-white rounded">
            <div class="mt-6">
                <div class="bg-white rounded-sm shadow-sm">
                    <div>
                        <x-app.print-header />
                        <div class="mt-6 text-lg font-bold text-center underline uppercase">
                            PAYMENT RECEIPT
                        </div>
                    </div>

                    <div class="mt-4 border border-b border-black border-dashed"></div>

                </div>
                <div class="mx-8">
                    <div class="mt-4 text-gray-700 md:flex">
                        <div>
                            <div class="grid grid-cols-2">
                                <div class="px-2 py-2 font-semibold">Date:</div>
                                <div class="py-2">
                                    {{ $payment->created_at->format('d/m/Y') }}
                                </div>
                            </div>

                            <div class="grid grid-cols-2">
                                <div class="px-2 py-2 font-mono font-semibold">Patient ID:</div>
                                <div class="px-2 py-2 font-mono">{{ $patient->patient_number }}</div>
                            </div>

                            <div class="grid grid-cols-2">
                                <div class="px-2 py-2 font-mono font-semibold">Patient Name:</div>
                                <div class="px-2 py-2 font-mono">{{ $patient->full_name }}</div>
                            </div>

                            <div class="grid grid-cols-2">
                                <div class="px-2 py-2 font-mono font-semibold">Age:</div>
                                <div class="px-2 py-2 font-mono">
                                    @if (!is_null($patient->date_of_birth))
                                        {{ $patient->ageFromDob() }}
                                        years
                                    @else
                                        @foreach ($patient->patient_visits as $patient_visit)
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
                                <div class="px-2 py-2 font-mono font-semibold">Sex:</div>
                                <div class="px-2 py-2 font-mono">{{ $patient->gender }}</div>
                            </div>

                            <div class="grid grid-cols-2">
                                <div class="px-2 py-2 font-mono font-semibold">Receipt No.:</div>
                                <div class="px-2 py-2 font-mono">{{ 123 }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 border border-b border-black border-dashed"></div>

                    <div>
                        <div>
                            <span class="px-2 py-2 font-mono font-semibold">
                                Total Amount:
                            </span>
                            <span class="px-2 py-2 font-mono">
                                UGX. {{ $payment->total_amount_due }}
                            </span>
                        </div>
                        <div>
                            <span class="px-2 py-2 font-mono font-semibold">
                                Amount Paid:
                            </span>
                            <span class="px-2 py-1 font-mono">
                                UGX. {{ $payment->payment_amount }}
                            </span>
                        </div>
                        <div>
                            <span class="px-2 py-2 font-mono font-semibold">
                                Balance Due:
                            </span>
                            <span class="px-2 py-1 font-mono">
                                UGX. {{ $payment->payment_balance }}
                            </span>
                        </div>
                    </div>

                    <div class="mt-4 border border-b border-black border-dashed"></div>

                    <div class="text-sm md:flex">
                        <div class="px-2 py-2 font-mono font-semibold">
                            SERVICES:
                        </div>
                        <div class="px-2 py-1 ml-4 font-mono">
                            <ul>
                                @foreach ($patient->test_results as $test_result)
                                    <li class="ml-4 list-decimal">
                                        {{ $test_result->lab_service->service_name }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="mt-4 border border-b border-black border-dashed"></div>

                    <div class="my-8">
                        <div class="mb-8">
                            <div class="mt-4 font-mono">
                                Signature:..........................................
                            </div>
                            <div class="mt-4 font-mono text-xs">
                                Thank you for visiting us today at KEISHA MEDICAL LAB
                            </div>

                            <div class="mt-4 font-mono text-xs">
                                for any question, please call +256787388848 or info@keishamedicallab.xyz
                            </div>

                            <div class="pt-2 pb-8 font-mono text-xs">
                                Receipt printed by {{ Auth::user()->name }}
                            </div>
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
