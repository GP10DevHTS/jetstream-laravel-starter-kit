<x-app-layout>
    <x-slot name="title">
        Patient Info
    </x-slot>

    <x-app.flash-message />

    <x-app.card>
        <x-slot name="banner">
            <div class="flex">
                <div class="flex-1">
                    Patient Info
                </div>
                <div>
                    <x-app.back href="{{ route('patients.index') }}" />
                </div>
            </div>
        </x-slot>
        <hr />
        <dl class="mt-4">
            <div class="grid grid-cols-[--cols-default] lg:grid-cols-[--cols-lg] fi-in-component-ctn gap-6">
                <div style="--col-span-default: 1 / -1;" class="col-[--col-span-default]">
                    <section
                        class="bg-white shadow-sm fi-section rounded-xl ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10"
                        id="patient-info">
                        <header class="flex items-center px-6 py-4 overflow-hidden gap-x-3">

                            <div class="grid flex-1 gap-y-1">
                                <h3
                                    class="text-base font-semibold leading-6 fi-section-header-heading text-gray-950 dark:text-white">
                                    Patient Info
                                </h3>

                            </div>
                        </header>

                        <div class="border-t border-gray-200 fi-section-content-ctn dark:border-white/10">
                            <div class="p-6 fi-section-content">
                                <dl>
                                    <div style="--cols-default: repeat(1, minmax(0, 1fr));"
                                        class="grid grid-cols-[--cols-default] fi-in-component-ctn gap-6">
                                        <div style="--col-span-default: span 1 / span 1;"
                                            class="col-[--col-span-default]">
                                            <div class="flex flex-col gap-6 lg:flex-row lg:items-start">
                                                <div class="flex-1 w-full">
                                                    <div>
                                                        <dl>
                                                            <div style="--cols-default: repeat(1, minmax(0, 1fr)); --cols-lg: repeat(2, minmax(0, 1fr));"
                                                                class="grid grid-cols-[--cols-default] lg:grid-cols-[--cols-lg] fi-in-component-ctn gap-6">
                                                                <div style="--col-span-default: span 1 / span 1;"
                                                                    class="col-[--col-span-default]">
                                                                    <div>
                                                                        <dl>
                                                                            <div style="--cols-default: repeat(1, minmax(0, 1fr));"
                                                                                class="grid grid-cols-[--cols-default] fi-in-component-ctn gap-6">
                                                                                <div style="--col-span-default: span 1 / span 1;"
                                                                                    class="col-[--col-span-default]">
                                                                                    <div class="fi-in-entry-wrp">
                                                                                        <div class="grid gap-y-2">
                                                                                            <div
                                                                                                class="flex items-center justify-between gap-x-3">
                                                                                                <dt
                                                                                                    class="inline-flex items-center fi-in-entry-wrp-label gap-x-3">
                                                                                                    <span
                                                                                                        class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                                                                                        Patient number
                                                                                                    </span>
                                                                                                </dt>
                                                                                            </div>

                                                                                            <div class="grid gap-y-2">
                                                                                                <dd class="">
                                                                                                    <div
                                                                                                        class="flex fi-in-affixes fi-in-text">
                                                                                                        <div
                                                                                                            class="flex-1 min-w-0">
                                                                                                            <div
                                                                                                                class="">
                                                                                                                <div>
                                                                                                                    <div class="fi-in-text-item inline-flex items-center gap-1.5 text-sm leading-6 text-gray-950 dark:text-white font-bold "
                                                                                                                        style="">

                                                                                                                        <div
                                                                                                                            class="">
                                                                                                                            {{ $patient->patient_number }}
                                                                                                                        </div>

                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>

                                                                                                    </div>
                                                                                                </dd>

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div style="--col-span-default: span 1 / span 1;"
                                                                                    class="col-[--col-span-default]">
                                                                                    <div class="fi-in-entry-wrp">

                                                                                        <div class="grid gap-y-2">
                                                                                            <div
                                                                                                class="flex items-center justify-between gap-x-3">
                                                                                                <dt
                                                                                                    class="inline-flex items-center fi-in-entry-wrp-label gap-x-3">


                                                                                                    <span
                                                                                                        class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                                                                                        Full name
                                                                                                    </span>


                                                                                                </dt>

                                                                                            </div>

                                                                                            <div class="grid gap-y-2">
                                                                                                <dd class="">
                                                                                                    <div
                                                                                                        class="flex fi-in-affixes fi-in-text">

                                                                                                        <div
                                                                                                            class="flex-1 min-w-0">
                                                                                                            <div
                                                                                                                class="">

                                                                                                                <div>
                                                                                                                    <div class="fi-in-text-item inline-flex items-center gap-1.5 text-sm leading-6 text-gray-950 dark:text-white font-bold "
                                                                                                                        style="">

                                                                                                                        <div
                                                                                                                            class="">
                                                                                                                            {{ $patient->full_name }}
                                                                                                                        </div>

                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>

                                                                                                    </div>
                                                                                                </dd>

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div style="--col-span-default: span 1 / span 1;"
                                                                                    class="col-[--col-span-default]">
                                                                                    <div class="fi-in-entry-wrp">

                                                                                        <div class="grid gap-y-2">
                                                                                            <div
                                                                                                class="flex items-center justify-between gap-x-3">
                                                                                                <dt
                                                                                                    class="inline-flex items-center fi-in-entry-wrp-label gap-x-3">


                                                                                                    <span
                                                                                                        class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                                                                                        Gender
                                                                                                    </span>


                                                                                                </dt>

                                                                                            </div>

                                                                                            <div class="grid gap-y-2">
                                                                                                <dd class="">
                                                                                                    <div
                                                                                                        class="flex fi-in-affixes fi-in-text">

                                                                                                        <div
                                                                                                            class="flex-1 min-w-0">
                                                                                                            <div
                                                                                                                class="">

                                                                                                                <div>
                                                                                                                    <div class="fi-in-text-item inline-flex items-center gap-1.5 text-sm leading-6 text-gray-950 dark:text-white font-bold "
                                                                                                                        style="">

                                                                                                                        <div
                                                                                                                            class="">
                                                                                                                            {{ $patient->gender }}
                                                                                                                        </div>

                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>

                                                                                                    </div>
                                                                                                </dd>

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div style="--col-span-default: span 1 / span 1;"
                                                                                    class="col-[--col-span-default]">
                                                                                    <div class="fi-in-entry-wrp">

                                                                                        <div class="grid gap-y-2">
                                                                                            <div
                                                                                                class="flex items-center justify-between gap-x-3">
                                                                                                <dt
                                                                                                    class="inline-flex items-center fi-in-entry-wrp-label gap-x-3">


                                                                                                    <span
                                                                                                        class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                                                                                        @if (!is_null($patient->date_of_birth))
                                                                                                            Date of
                                                                                                            birth
                                                                                                        @else
                                                                                                            Age
                                                                                                        @endif
                                                                                                    </span>


                                                                                                </dt>

                                                                                            </div>

                                                                                            <div class="grid gap-y-2">
                                                                                                <dd class="">
                                                                                                    <div
                                                                                                        class="flex fi-in-affixes fi-in-text">

                                                                                                        <div
                                                                                                            class="flex-1 min-w-0">
                                                                                                            <div
                                                                                                                class="">
                                                                                                                <div class="fi-in-text-item inline-flex items-center gap-1.5 text-sm leading-6 text-gray-950 dark:text-white font-bold "
                                                                                                                    style="">
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
                                                                                                                            @else
                                                                                                                                ---
                                                                                                                            @endif
                                                                                                                        @endforeach
                                                                                                                    @endif
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                    </div>
                                                                                                </dd>

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </dl>

                                                                    </div>
                                                                </div>
                                                                <div style="--col-span-default: span 1 / span 1;"
                                                                    class="col-[--col-span-default]">
                                                                    <div>
                                                                        <dl>
                                                                            <div style="--cols-default: repeat(1, minmax(0, 1fr));"
                                                                                class="grid grid-cols-[--cols-default] fi-in-component-ctn gap-6">
                                                                                <div style="--col-span-default: span 1 / span 1;"
                                                                                    class="col-[--col-span-default]">
                                                                                    <div class="fi-in-entry-wrp">

                                                                                        <div class="grid gap-y-2">
                                                                                            <div
                                                                                                class="flex items-center justify-between gap-x-3">
                                                                                                <dt
                                                                                                    class="inline-flex items-center fi-in-entry-wrp-label gap-x-3">


                                                                                                    <span
                                                                                                        class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                                                                                        Phone number
                                                                                                    </span>


                                                                                                </dt>

                                                                                            </div>

                                                                                            <div class="grid gap-y-2">
                                                                                                <dd class="">
                                                                                                    <div
                                                                                                        class="flex fi-in-affixes fi-in-text">

                                                                                                        <div
                                                                                                            class="flex-1 min-w-0">
                                                                                                            <div
                                                                                                                class="">

                                                                                                                <div>
                                                                                                                    <div class="fi-in-text-item inline-flex items-center gap-1.5 text-sm leading-6 text-gray-950 dark:text-white font-bold "
                                                                                                                        style="">

                                                                                                                        <div
                                                                                                                            class="">
                                                                                                                            {{ $patient->phone_number }}
                                                                                                                        </div>

                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>

                                                                                                    </div>
                                                                                                </dd>

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div style="--col-span-default: span 1 / span 1;"
                                                                                    class="col-[--col-span-default]">
                                                                                    <div class="fi-in-entry-wrp">

                                                                                        <div class="grid gap-y-2">
                                                                                            <div
                                                                                                class="flex items-center justify-between gap-x-3">
                                                                                                <dt
                                                                                                    class="inline-flex items-center fi-in-entry-wrp-label gap-x-3">


                                                                                                    <span
                                                                                                        class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                                                                                        Email
                                                                                                    </span>


                                                                                                </dt>

                                                                                            </div>

                                                                                            <div class="grid gap-y-2">
                                                                                                <dd class="">
                                                                                                    <div
                                                                                                        class="flex fi-in-affixes fi-in-text">

                                                                                                        <div
                                                                                                            class="flex-1 min-w-0">
                                                                                                            <div
                                                                                                                class="">

                                                                                                                <div>
                                                                                                                    <div class="fi-in-text-item inline-flex items-center gap-1.5 text-sm leading-6 text-gray-950 dark:text-white font-bold "
                                                                                                                        style="">

                                                                                                                        <div
                                                                                                                            class="">
                                                                                                                            {{ $patient->email }}
                                                                                                                        </div>

                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>

                                                                                                    </div>
                                                                                                </dd>

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div style="--col-span-default: span 1 / span 1;"
                                                                                    class="col-[--col-span-default]">
                                                                                    <div class="fi-in-entry-wrp">

                                                                                        <div class="grid gap-y-2">
                                                                                            <div
                                                                                                class="flex items-center justify-between gap-x-3">
                                                                                                <dt
                                                                                                    class="inline-flex items-center fi-in-entry-wrp-label gap-x-3">


                                                                                                    <span
                                                                                                        class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                                                                                        Residence
                                                                                                    </span>


                                                                                                </dt>

                                                                                            </div>

                                                                                            <div class="grid gap-y-2">
                                                                                                <dd class="">
                                                                                                    <div
                                                                                                        class="flex fi-in-affixes fi-in-text">

                                                                                                        <div
                                                                                                            class="flex-1 min-w-0">
                                                                                                            <div
                                                                                                                class="">

                                                                                                                <div>
                                                                                                                    <div class="fi-in-text-item inline-flex items-center gap-1.5 text-sm leading-6 text-gray-950 dark:text-white font-bold "
                                                                                                                        style="">

                                                                                                                        <div
                                                                                                                            class="">
                                                                                                                            {{ $patient->residence }}
                                                                                                                        </div>

                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>

                                                                                                    </div>
                                                                                                </dd>

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </dl>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </dl>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </dl>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </dl>

        <livewire:patients.new-patient-visit-component :patient="$patient">
    </x-app.card>
</x-app-layout>
