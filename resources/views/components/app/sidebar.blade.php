<div>
    <!-- Sidebar backdrop (mobile only) -->
    <div class="fixed inset-0 z-40 transition-opacity duration-200 bg-slate-900 bg-opacity-30 lg:hidden lg:z-auto"
        :class="sidebarOpen ? 'opacity-100' : 'opacity-0 pointer-events-none'" aria-hidden="true" x-cloak></div>

    <!-- Sidebar -->
    <div id="sidebar"
        class="flex flex-col absolute z-40 left-0 top-0 lg:static lg:left-auto lg:top-auto lg:translate-x-0 h-screen overflow-y-scroll lg:overflow-y-auto no-scrollbar w-64 lg:w-20 lg:sidebar-expanded:!w-64 2xl:!w-64 shrink-0 bg-slate-800 p-4 transition-all duration-200 ease-in-out"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-64'" @click.outside="sidebarOpen = false"
        @keydown.escape.window="sidebarOpen = false" x-cloak="lg">

        <!-- Sidebar header -->
        <div class="flex justify-between pr-3 mb-10 sm:px-2">
            <!-- Close button -->
            <button class="lg:hidden text-slate-500 hover:text-slate-400" @click.stop="sidebarOpen = !sidebarOpen"
                aria-controls="sidebar" :aria-expanded="sidebarOpen">
                <span class="sr-only">Close sidebar</span>
                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z" />
                </svg>
            </button>
            <!-- Logo -->
            <a class="block" href="{{ route('dashboard') }}">
                <div class="flex">
                    <div>
                        <svg width="32" height="32" viewBox="0 0 32 32">
                            <defs>
                                <linearGradient x1="28.538%" y1="20.229%" x2="100%" y2="108.156%"
                                    id="logo-a">
                                    <stop stop-color="#A5B4FC" stop-opacity="0" offset="0%" />
                                    <stop stop-color="#A5B4FC" offset="100%" />
                                </linearGradient>
                                <linearGradient x1="88.638%" y1="29.267%" x2="22.42%" y2="100%"
                                    id="logo-b">
                                    <stop stop-color="#38BDF8" stop-opacity="0" offset="0%" />
                                    <stop stop-color="#38BDF8" offset="100%" />
                                </linearGradient>
                            </defs>
                            <rect fill="#6366F1" width="32" height="32" rx="16" />
                            <path
                                d="M18.277.16C26.035 1.267 32 7.938 32 16c0 8.837-7.163 16-16 16a15.937 15.937 0 01-10.426-3.863L18.277.161z"
                                fill="#4F46E5" />
                            <path
                                d="M7.404 2.503l18.339 26.19A15.93 15.93 0 0116 32C7.163 32 0 24.837 0 16 0 10.327 2.952 5.344 7.404 2.503z"
                                fill="url(#logo-a)" />
                            <path
                                d="M2.223 24.14L29.777 7.86A15.926 15.926 0 0132 16c0 8.837-7.163 16-16 16-5.864 0-10.991-3.154-13.777-7.86z"
                                fill="url(#logo-b)" />
                        </svg>
                    </div>
                    <div class="mt-1 ml-2 text-lg font-bold text-white">{{ config('app.name') }}</div>
                </div>
            </a>
        </div>

        <!-- Links -->
        <div class="space-y-8">
            <!-- Pages group -->
            <div>
                {{-- <h3 class="pl-3 text-xs font-semibold uppercase text-slate-500">
                    <span class="hidden w-6 text-center lg:block lg:sidebar-expanded:hidden 2xl:hidden"
                        aria-hidden="true">•••</span>
                    <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">Pages</span>
                </h3> --}}
                <ul class="mt-3">
                    <!-- Dashboard -->
                    @can('View dashboard module')
                        <li
                            class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(1), ['dashboard'])) {{ 'bg-slate-900' }} @endif">
                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('dashboard')) {{ '!text-indigo-500' }} @endif"
                                href="{{ route('dashboard') }}">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center grow">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            class="w-6 h-6 bi bi-house shrink-0" viewBox="0 0 16 16">
                                            <path
                                                class="fill-current @if (in_array(Request::segment(1), ['dashboard'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-400' }} @endif"
                                                d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z" />
                                        </svg>
                                        <span
                                            class="ml-3 text-sm font-medium duration-200 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100">Dashboard</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endcan

                    <!-- results -->
                    @can('view result option module')
                        <li
                            class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(1), ['result-options'])) {{ 'bg-slate-900' }} @endif">
                            <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(1), ['result-options'])) {{ '!text-indigo-500' }} @endif"
                                href="{{ route('result-options.index') }}">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="w-6 h-6 bi bi-list-task shrink-0" viewBox="0 0 16 16">
                                        <path
                                            class="fill-current @if (in_array(Request::segment(1), ['result-options'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-400' }} @endif"
                                            fill-rule="evenodd"
                                            d="M2 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5V3a.5.5 0 0 0-.5-.5H2zM3 3H2v1h1V3z" />
                                        <path
                                            class="fill-current @if (in_array(Request::segment(1), ['result-options'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-400' }} @endif"
                                            d="M5 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM5.5 7a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 4a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9z" />
                                        <path
                                            class="fill-current @if (in_array(Request::segment(1), ['result-options'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-400' }} @endif"
                                            fill-rule="evenodd"
                                            d="M1.5 7a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5V7zM2 7h1v1H2V7zm0 3.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5H2zm1 .5H2v1h1v-1z" />
                                    </svg>
                                    <span
                                        class="ml-3 text-sm font-medium duration-200 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100">Result
                                        Options</span>
                                </div>
                            </a>
                        </li>
                    @endcan

                    <!-- Categories -->
                    @can('view lab service category module')
                        <li
                            class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(1), ['service-categories'])) {{ 'bg-slate-900' }} @endif">
                            <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(1), ['service-categories'])) {{ '!text-indigo-500' }} @endif"
                                href="{{ route('service-categories.index') }}">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="w-6 h-6 bi bi-collection shrink-0" viewBox="0 0 16 16">
                                        <path
                                            class="fill-current @if (in_array(Request::segment(1), ['service-categories'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-400' }} @endif"
                                            d="M2.5 3.5a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-11zm2-2a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1h-7zM0 13a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 16 13V6a1.5 1.5 0 0 0-1.5-1.5h-13A1.5 1.5 0 0 0 0 6v7zm1.5.5A.5.5 0 0 1 1 13V6a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-13z" />
                                    </svg>
                                    <span
                                        class="ml-3 text-sm font-medium duration-200 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100">Lab
                                        Service Categories</span>
                                </div>
                            </a>
                        </li>
                    @endcan

                    <!-- teb services -->
                    @can('view lab service module')
                        <li
                            class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(1), ['lab-services'])) {{ 'bg-slate-900' }} @endif">
                            <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(1), ['lab-services'])) {{ '!text-indigo-500' }} @endif"
                                href="{{ route('lab-services.index') }}">
                                <div class="flex items-center">

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="w-6 h-6 bi bi-inboxes shrink-0" viewBox="0 0 16 16">
                                        <path
                                            class="fill-current @if (in_array(Request::segment(1), ['lab-services'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-400' }} @endif"
                                            d="M4.98 1a.5.5 0 0 0-.39.188L1.54 5H6a.5.5 0 0 1 .5.5 1.5 1.5 0 0 0 3 0A.5.5 0 0 1 10 5h4.46l-3.05-3.812A.5.5 0 0 0 11.02 1H4.98zm9.954 5H10.45a2.5 2.5 0 0 1-4.9 0H1.066l.32 2.562A.5.5 0 0 0 1.884 9h12.234a.5.5 0 0 0 .496-.438L14.933 6zM3.809.563A1.5 1.5 0 0 1 4.981 0h6.038a1.5 1.5 0 0 1 1.172.563l3.7 4.625a.5.5 0 0 1 .105.374l-.39 3.124A1.5 1.5 0 0 1 14.117 10H1.883A1.5 1.5 0 0 1 .394 8.686l-.39-3.124a.5.5 0 0 1 .106-.374L3.81.563zM.125 11.17A.5.5 0 0 1 .5 11H6a.5.5 0 0 1 .5.5 1.5 1.5 0 0 0 3 0 .5.5 0 0 1 .5-.5h5.5a.5.5 0 0 1 .496.562l-.39 3.124A1.5 1.5 0 0 1 14.117 16H1.883a1.5 1.5 0 0 1-1.489-1.314l-.39-3.124a.5.5 0 0 1 .121-.393zm.941.83.32 2.562a.5.5 0 0 0 .497.438h12.234a.5.5 0 0 0 .496-.438l.32-2.562H10.45a2.5 2.5 0 0 1-4.9 0H1.066z" />
                                    </svg>
                                    <span
                                        class="ml-3 text-sm font-medium duration-200 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100">Lab
                                        Services</span>
                                </div>
                            </a>
                        </li>
                    @endcan

                    <!-- spacemen -->
                    @can('view specimen module')
                        <li
                            class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(1), ['spacemens'])) {{ 'bg-slate-900' }} @endif">
                            <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(1), ['spacemens'])) {{ '!text-indigo-500' }} @endif""
                                href="{{ route('spacemens.index') }}">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6 shrink-0">
                                        <path
                                            class="fill-current @if (in_array(Request::segment(1), ['spacemens'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-400' }} @endif"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z" />
                                    </svg>
                                    <span
                                        class="ml-3 text-sm font-medium duration-200 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100">Specimen</span>
                                </div>
                            </a>
                        </li>
                    @endcan

                    <!-- patients -->
                    @can('view patient module')
                        <li
                            class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(1), ['patients'])) {{ 'bg-slate-900' }} @endif">
                            <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(1), ['patients'])) {{ '!text-indigo-500' }} @endif"
                                href="{{ route('patients.index') }}">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center grow">

                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            class="w-6 h-6 bi bi-people shrink-0" viewBox="0 0 16 16">
                                            <path
                                                class="fill-current @if (in_array(Request::segment(1), ['patients'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-400' }} @endif"
                                                d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z" />
                                        </svg>
                                        <span
                                            class="ml-3 text-sm font-medium duration-200 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100">Patients</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endcan

                    <!-- laboratory -->
                    @can('view laboratory module')
                        <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(1), ['laboratory'])) {{ 'bg-slate-900' }} @endif"
                            x-data="{ open: {{ in_array(Request::segment(1), ['laboratory']) ? 1 : 0 }} }">
                            <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(1), ['laboratory'])) {{ '!text-indigo-500' }} @endif"
                                href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            class="w-6 h-6 shrink-0 bi bi-prescription2" viewBox="0 0 16 16">
                                            <path d="M7 6h2v2h2v2H9v2H7v-2H5V8h2V6Z" />
                                            <path
                                                class="fill-current @if (in_array(Request::segment(1), ['laboratory'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-400' }} @endif"
                                                d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v10.5a1.5 1.5 0 0 1-1.5 1.5h-7A1.5 1.5 0 0 1 3 14.5V4a1 1 0 0 1-1-1V1Zm2 3v10.5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V4H4ZM3 3h10V1H3v2Z" />
                                        </svg>
                                        <span
                                            class="ml-3 text-sm font-medium duration-200 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100">
                                            Laboratory
                                        </span>
                                    </div>

                                    <!-- Dropdown Icon -->
                                    <div
                                        class="flex ml-2 duration-200 shrink-0 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100">
                                        <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400 @if (in_array(Request::segment(1), ['laboratory'])) {{ 'rotate-180' }} @endif"
                                            :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                        </svg>
                                    </div>
                                </div>
                            </a>
                            <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                <ul class="pl-9 mt-1 @if (!in_array(Request::segment(1), ['laboratory'])) {{ 'hidden' }} @endif"
                                    :class="open ? '!block' : 'hidden'">
                                    @can('view test order')
                                        <li class="mb-1 last:mb-0">
                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('test-orders.index')) {{ '!text-indigo-500' }} @endif"
                                                href="{{ route('test-orders.index') }}">
                                                <span
                                                    class="text-sm font-medium duration-200 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100">
                                                    Test Orders
                                                </span>
                                            </a>
                                        </li>
                                    @endcan

                                    @can('view test result')
                                        <li class="mb-1 last:mb-0">
                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('test-results.index')) {{ '!text-indigo-500' }} @endif"
                                                href="{{ route('test-results.index') }}">
                                                <span
                                                    class="text-sm font-medium duration-200 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100">
                                                    Test Result
                                                </span>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </div>
                        </li>
                    @endcan

                    <!-- Accounting -->
                    @can('view accounting module')
                        <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(1), ['accountings'])) {{ 'bg-slate-900' }} @endif"
                            x-data="{ open: {{ in_array(Request::segment(1), ['accountings']) ? 1 : 0 }} }">
                            <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(1), ['accountings'])) {{ '!text-indigo-500' }} @endif"
                                href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">

                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            class="w-6 h-6 shrink-0 bi bi-cash-coin" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z" />
                                            <path
                                                class="fill-current @if (in_array(Request::segment(1), ['accountings'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-400' }} @endif"
                                                d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z" />
                                            <path
                                                class="fill-current @if (in_array(Request::segment(1), ['accountings'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-400' }} @endif"
                                                d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z" />
                                            <path
                                                d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z" />
                                        </svg>
                                        <span
                                            class="ml-3 text-sm font-medium duration-200 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100">
                                            Accounting
                                        </span>
                                    </div>

                                    <!-- Dropdown Icon -->
                                    <div
                                        class="flex ml-2 duration-200 shrink-0 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100">
                                        <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400 @if (in_array(Request::segment(1), ['accountings'])) {{ 'rotate-180' }} @endif"
                                            :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                        </svg>
                                    </div>
                                </div>
                            </a>
                            <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                <ul class="pl-9 mt-1 @if (!in_array(Request::segment(1), ['accountings'])) {{ 'hidden' }} @endif"
                                    :class="open ? '!block' : 'hidden'">
                                    @can('view payments module')
                                        <li class="mb-1 last:mb-0">
                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('accountings.index')) {{ '!text-indigo-500' }} @endif"
                                                href="{{ route('accountings.index') }}">
                                                <span
                                                    class="text-sm font-medium duration-200 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100">
                                                    Payments
                                                </span>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </div>
                        </li>
                    @endcan

                    <!-- roles and permissions -->
                    @can('view roles and permissions module')
                        <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(1), ['roles-permissions'])) {{ 'bg-slate-900' }} @endif"
                            x-data="{ open: {{ in_array(Request::segment(1), ['roles-permissions']) ? 1 : 0 }} }">
                            <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(1), ['roles-permissions'])) {{ '!text-indigo-500' }} @endif"
                                href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">

                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            class="w-7 h-7 bi bi-person-lock shrink-0" viewBox="0 0 16 16">
                                            <path
                                                class="fill-current @if (in_array(Request::segment(1), ['roles-permissions'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif"
                                                d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 5.996V14H3s-1 0-1-1 1-4 6-4c.564 0 1.077.038 1.544.107a4.524 4.524 0 0 0-.803.918A10.46 10.46 0 0 0 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h5ZM9 13a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2Zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1Z" />
                                        </svg>
                                        <span
                                            class="ml-3 text-sm font-medium duration-200 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100">Roles
                                            & Permissions</span>
                                    </div>
                                    <!-- Icon -->
                                    <div
                                        class="flex ml-2 duration-200 shrink-0 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100">
                                        <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400 @if (in_array(Request::segment(1), ['roles-permissions'])) {{ 'rotate-180' }} @endif"
                                            :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                        </svg>
                                    </div>
                                </div>
                            </a>
                            <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                <ul class="pl-9 mt-1 @if (!in_array(Request::segment(1), ['roles-permissions'])) {{ 'hidden' }} @endif"
                                    :class="open ? '!block' : 'hidden'">
                                    @can('view roles module')
                                        <li class="mb-1 last:mb-0">
                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('permissions.index')) {{ '!text-indigo-500' }} @endif"
                                                href="{{ route('permissions.index') }}">
                                                <span
                                                    class="text-sm font-medium duration-200 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100">
                                                    Permissions
                                                </span>
                                            </a>
                                        </li>
                                    @endcan

                                    @can('view roles module')
                                        <li class="mb-1 last:mb-0">
                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('roles.index')) {{ '!text-indigo-500' }} @endif"
                                                href="{{ route('roles.index') }}">
                                                <span
                                                    class="text-sm font-medium duration-200 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100">
                                                    Roles
                                                </span>
                                            </a>
                                        </li>
                                    @endcan

                                    @can('view assign role module')
                                        <li class="mb-1 last:mb-0">
                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('assign-roles.index')) {{ '!text-indigo-500' }} @endif"
                                                href="{{ route('assign-roles.index') }}">
                                                <span
                                                    class="text-sm font-medium duration-200 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100">
                                                    Assign Role
                                                </span>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </div>
                        </li>
                    @endcan
                </ul>
            </div>
        </div>

        <!-- Expand / collapse button -->
        <div class="justify-end hidden pt-3 mt-auto lg:inline-flex 2xl:hidden">
            <div class="px-3 py-2">
                <button @click="sidebarExpanded = !sidebarExpanded">
                    <span class="sr-only">Expand / collapse sidebar</span>
                    <svg class="w-6 h-6 fill-current sidebar-expanded:rotate-180" viewBox="0 0 24 24">
                        <path class="text-slate-400"
                            d="M19.586 11l-5-5L16 4.586 23.414 12 16 19.414 14.586 18l5-5H7v-2z" />
                        <path class="text-slate-600" d="M3 23H1V1h2z" />
                    </svg>
                </button>
            </div>
        </div>

    </div>
</div>
