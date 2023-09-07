<div>
    <div>
        @if ($result_options->isNotEmpty())
            <div class="px-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
                <div class="inline-block min-w-full overflow-hidden rounded shadow">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th
                                    class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                    Option
                                </th>

                                <th
                                    class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                    Code
                                </th>
                                <th
                                    class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                    Symbol
                                </th>

                                {{-- @can('View category') --}}
                                <th
                                    class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                    Actions
                                </th>
                                {{-- @endcan --}}
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($result_options as $result_option)
                                <tr>
                                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $result_option->option }}
                                        </p>
                                    </td>

                                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $result_option->code }}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $result_option->symbol }}
                                        </p>
                                    </td>

                                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                        <div class="flex">
                                            <div class="flex">
                                                <button wire:click.prevent="openRestoreModal({{ $result_option->id }})"
                                                    class="inline-flex items-center px-1 py-1 mb-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-indigo-500 border border-transparent rounded-md hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:shadow-outline-indigo disabled:opacity-25'"
                                                    title="Restore">

                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        class="w-6 h-6 mr-2 bi bi-arrow-counterclockwise"
                                                        viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z" />
                                                        <path
                                                            d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z" />
                                                    </svg>
                                                    Restore
                                                </button>
                                            </div>
                                        </div>
                                        </p>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="flex flex-col items-center px-5 py-5 bg-white border-t xs:flex-row xs:justify-between ">
                        <div class="inline-flex mt-2 xs:mt-0">
                            {{-- {{ $categories->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        @else
            {{ _('No records found yet') }}
        @endif
    </div>
    @include('partials.restore-test-service-modal')
</div>
