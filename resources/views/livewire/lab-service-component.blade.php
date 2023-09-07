<section>
    @if ($lab_services->isNotEmpty())
        <div>
            <div class="mt-6 md:flex md:items-center md:justify-between">
                <div>
                    {{-- <button wire:click.prevent="deleteSelected"
                    onclick="confirm('Are you sure you want to continue?') || event.stopImmediatePropagation()"
                    class="@if ($bulkDisabled) opacity-0 @endif flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-red-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-red-600 dark:hover:bg-red-500 dark:bg-red-600">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>

                    <span>Delete Selected</span>
                </button> --}}
                </div>

                <div class="md:flex">
                    <div class="relative flex items-center mt-4 md:mt-0">
                        <span class="absolute">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-5 h-5 mx-3 text-gray-400 dark:text-gray-600">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>
                        </span>

                        <input type="text" wire:model="search" placeholder="Search"
                            class="block w-full py-1.5 pr-5 text-gray-700 bg-white border border-gray-200 rounded-lg md:w-80 placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40">
                    </div>

                    @can('add lab service')
                        <button wire:click="openCreateModal"
                            class="flex items-center justify-center w-1/2 px-5 py-2 ml-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>

                            <span>New Lab Service</span>
                        </button>
                    @endcan
                </div>
            </div>

            <div class="flex flex-col mt-6">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-800">
                                    <tr>
                                        <th scope="col"
                                            class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            <a wire:click.prevent="sortBy('category_name')" role="button"
                                                href="#" class="flex">
                                                Service Name
                                                @include('partials.sort_icons', [
                                                    'field' => 'category_name',
                                                ])
                                            </a>
                                        </th>
                                        <th scope="col"
                                            class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Service Category
                                        </th>
                                        <th scope="col"
                                            class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Result Options
                                        </th>

                                        <th scope="col"
                                            class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Price (UGX.)
                                        </th>

                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            <a wire:click.prevent="sortBy('created_at')" role="button" href="#"
                                                class="flex">
                                                Created On
                                                @include('partials.sort_icons', ['field' => 'created_at'])
                                            </a>
                                        </th>

                                        <th scope="col" class="relative py-3.5 px-4">
                                            <span class="sr-only">Action</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                    @foreach ($lab_services as $lab_service)
                                        <tr>
                                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                <div>
                                                    {{ $lab_service->service_name }}
                                                </div>
                                            </td>
                                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                <div>
                                                    {{ $lab_service->lab_service_category->category_name }}
                                                </div>
                                            </td>
                                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                <div>
                                                    <ul>
                                                        @foreach ($lab_service->result_options as $result_option)
                                                            <li class="list-disc">
                                                                {{ $result_option->option }}
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </td>

                                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                <div>
                                                    @money($lab_service->price)
                                                </div>
                                            </td>

                                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                <div>
                                                    {{ $lab_service->created_at->format('D, d M Y | H:i:s') }}
                                                </div>
                                            </td>


                                            <td class="px-6 py-3 text-center">
                                                <div class="flex justify-center item-center">
                                                    <!-- edit -->
                                                    @can('edit lab service')
                                                        <a wire:click.prevent="openEditModal({{ $lab_service->id }})"
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
                                                    @can('delete lab service')
                                                        <button wire:click.prevent="openDeleteModal({{ $lab_service->id }})"
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
                                                    @endcan
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

            <div class="mt-6 sm:flex sm:items-center sm:justify-between ">
                {{ $lab_services->links() }}
            </div>

        </div>
    @else
        <div
            class="mt-6 overflow-hidden bg-white divide-y divide-gray-200 shadow-sm fi-ta-ctn rounded-xl ring-1 ring-gray-950/5 dark:divide-white/10 dark:bg-gray-900 dark:ring-white/10">
            <div
                class="relative overflow-x-auto divide-y divide-gray-200 fi-ta-content dark:divide-white/10 dark:border-t-white/10">
                <div class="px-6 py-12 fi-ta-empty-state">
                    <div class="grid max-w-lg mx-auto text-center fi-ta-empty-state-content justify-items-center">
                        <div class="p-3 mb-4 bg-gray-100 rounded-full fi-ta-empty-state-icon-ctn dark:bg-gray-500/20">
                            <svg class="w-6 h-6 text-gray-500 fi-ta-empty-state-icon dark:text-gray-400"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </div>

                        <h4
                            class="text-base font-semibold leading-6 fi-ta-empty-state-heading text-gray-950 dark:text-white">
                            No service available
                        </h4>

                        <p class="mt-1 text-sm text-gray-500 fi-ta-empty-state-description dark:text-gray-400">
                            Create a service to get started.
                        </p>

                        <div class="flex flex-wrap items-center justify-center gap-3 mt-6 fi-ta-actions shrink-0">

                            <span class="inline-flex ">
                                @can('add lab service')
                                    <button wire:click="openCreateModal"
                                        class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>

                                        <span>New service</span>
                                    </button>
                                @endcan
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    @endif
    @include('partials.lab-service-modal')
</section>
