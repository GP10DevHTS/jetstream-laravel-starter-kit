<div>
    <div>
        <div class="flex my-2 sm:flex-row">
            <div class="relative flex-1 block">
                <span class="absolute inset-y-0 left-0 flex items-center h-full pl-2">
                    <svg viewBox="0 0 24 24" class="w-4 h-4 text-gray-500 fill-current">
                        <path
                            d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
                        </path>
                    </svg>
                </span>
                <input wire:model.defer="search" placeholder="Search"
                    class="block w-1/2 py-2 pl-8 pr-6 text-sm text-gray-700 placeholder-gray-400 bg-white border border-b border-gray-400 rounded appearance-none sm:rounded-none focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
            </div>
            <div>
                @can('add patient')
                    <x-app.a href="{{ route('patients.create') }}">
                        <span class="mr-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6 bi bi-plus"
                                viewBox="0 0 16 16">
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                        </span>
                        Add Patient
                    </x-app.a>
                @endcan
            </div>
        </div>
        <div class="px-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
            <div class="inline-block min-w-full overflow-hidden rounded shadow">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th
                                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                <a wire:click.prevent="sortBy('registration_number')" role="button" href="#"
                                    class="flex">
                                    Reg. No.
                                    @include('partials.sort_icons', ['field' => 'registration_number'])
                                </a>
                            </th>

                            <th
                                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                <a wire:click.prevent="sortBy('full_name')" role="button" href="#"
                                    class="flex">
                                    Full Name
                                    @include('partials.sort_icons', ['field' => 'full_name'])
                                </a>
                            </th>

                            <th
                                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                <a wire:click.prevent="sortBy('gender')" role="button" href="#" class="flex">
                                    Gender
                                    @include('partials.sort_icons', ['field' => 'gender'])
                                </a>
                            </th>

                            {{-- <th
                                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                <a wire:click.prevent="sortBy('birth_date')" role="button" href="#"
                                    class="flex">
                                    Age
                                    @include('partials.sort_icons', ['field' => 'birth_date'])
                                </a>
                            </th> --}}

                            <th
                                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                Phone Number
                            </th>

                            @can('view patient')
                                <th
                                    class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                    Actions
                                </th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($patients as $patient)
                            <tr>
                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $patient->registration_number }}
                                    </p>
                                </td>

                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $patient->full_name }}
                                    </p>
                                </td>

                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $patient->gender }}
                                    </p>
                                </td>

                                {{-- <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        @if (!is_null($patient->birth_date))
                                            {{ $patient->ageFromDob }}
                                        @elseif(!is_null($patient->age))
                                            {{ $patient->age }}
                                        @endif
                                    </p>
                                </td> --}}

                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $patient->phone_number }}
                                    </p>
                                </td>

                                @can('view patient')
                                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                        <div class="flex">
                                            <div class="flex">
                                                @can('view patient')
                                                    <x-app.a href="{{ route('patients.show', $patient) }}"
                                                        class="text-blue-700 hover:underline hover:text-blue-900"
                                                        title="View">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                            class="w-4 h-4 mr-3 text-white hover:text-white bi bi-layout-text-window-reverse"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M13 6.5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5zm0 3a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5zm-.5 2.5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1h5z" />
                                                            <path
                                                                d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM2 1a1 1 0 0 0-1 1v1h14V2a1 1 0 0 0-1-1H2zM1 4v10a1 1 0 0 0 1 1h2V4H1zm4 0v11h9a1 1 0 0 0 1-1V4H5z" />
                                                        </svg>
                                                        View
                                                    </x-app.a>
                                                @endcan

                                                {{-- @can('edit patient')
                                                    <a href="{{ route('patients.edit', $patient) }}"
                                                        class="text-blue-700 hover:underline hover:text-blue-900"
                                                        title="Edit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                            class="w-4 h-4 mr-3 text-green-600 bi bi-pencil-square hover:text-green-800"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                            <path fill-rule="evenodd"
                                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                        </svg>
                                                    </a>
                                                @endcan --}}
                                            </div>
                                            @can('delete patient')
                                                <div>
                                                    <form action="{{ route('patients.destroy', $patient) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button title="Delete"
                                                            class="px-2 py-1 ml-2 text-white uppercase bg-red-700 rounded hover:bg-red-900"
                                                            onclick="javascript:return confirm('You are about to delete this Patient. Are you sure you want to continue?')">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                                class="w-4 h-4 mr-3 text-white bi bi-trash hover:text-white"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                                <path fill-rule="evenodd"
                                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            @endcan
                                        </div>
                                        </p>
                                    </td>
                                @endcan
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="flex flex-col items-center px-5 py-5 bg-white border-t xs:flex-row xs:justify-between ">
                    <div class="inline-flex mt-2 xs:mt-0">
                        {{ $patients->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
