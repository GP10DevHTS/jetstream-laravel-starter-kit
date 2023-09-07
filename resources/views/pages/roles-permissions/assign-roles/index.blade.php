<x-app-layout>
    <x-slot name="title">
        Assign Roles
    </x-slot>
    <x-app.card>
        <x-slot name="banner">
        </x-slot>
        <div>
            <div>
                <x-app.flash-message />

                <div class="flex flex-col my-2 sm:flex-row">
                    <div class="flex flex-row mb-1 sm:mb-0">
                        <div class="relative">
                            {{-- @can('Assign role') --}}
                            <a href="{{ route('assign-roles.create') }}"
                                class="flex pl-3 text-gray-500 hover:text-gray-900 hover:underline">
                                <span class="mr-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6 bi bi-plus"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                    </svg>
                                </span>
                                Assign Role
                            </a>
                            {{-- @endcan --}}
                        </div>
                    </div>

                </div>
                <div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
                    <div class="inline-block min-w-full overflow-hidden rounded shadow">
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                    <th
                                        class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200 dark:bg-gray-600 dark:text-gray-900 dark:border-gray-700">
                                        User
                                    </th>

                                    <th
                                        class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200 dark:bg-gray-600 dark:text-gray-900 dark:border-gray-700">
                                        Email
                                    </th>

                                    <th
                                        class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200 dark:bg-gray-600 dark:text-gray-900 dark:border-gray-700">
                                        Role
                                    </th>
                                    <th
                                        class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200 dark:bg-gray-600 dark:text-gray-900 dark:border-gray-700">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td
                                            class="px-5 py-5 text-sm bg-white border-b border-gray-200 dark:bg-gray-500 dark:border-gray-700">
                                            <div class="flex items-center">
                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap dark:text-gray-900">
                                                        {{ $user->name }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>

                                        <td
                                            class="px-5 py-5 text-sm bg-white border-b border-gray-200 dark:bg-gray-500 dark:border-gray-700">
                                            <div class="flex items-center">
                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap dark:text-gray-900">
                                                        {{ $user->email }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>

                                        <td
                                            class="px-5 py-5 text-sm bg-white border-b border-gray-200 dark:bg-gray-500 dark:border-gray-700">
                                            <div class="flex items-center">
                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap dark:text-gray-900">
                                                        @foreach ($user->getRoleNames() as $role)
                                                            <span class="text-sm px-2 bg-gray-500 text-white rounded">
                                                                {{ $role }}
                                                            </span>
                                                        @endforeach
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="px-5 py-2 text-sm bg-white border-b border-gray-200 dark:bg-gray-500 dark:border-gray-700">
                                            <p class="text-gray-900 whitespace-no-wrap dark:text-gray-900">
                                            </p>
                                            @foreach ($user->getRoleNames() as $role)
                                                @if ($role != 'Admin')
                                                    <div class="flex">
                                                        <a href="{{ route('assing-roles.show', $user) }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                                class="w-4 h-4 mr-3 text-blue-500 hover:text-blue-800 bi bi-layout-text-window-reverse"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M13 6.5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5zm0 3a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5zm-.5 2.5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1h5z">
                                                                </path>
                                                                <path
                                                                    d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM2 1a1 1 0 0 0-1 1v1h14V2a1 1 0 0 0-1-1H2zM1 4v10a1 1 0 0 0 1 1h2V4H1zm4 0v11h9a1 1 0 0 0 1-1V4H5z">
                                                                </path>
                                                            </svg>
                                                        </a>

                                                        {{-- @can('Edit role') --}}
                                                        <a href="{{ route('assing-roles.edit', $user) }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                                class="w-4 h-4 mr-3 text-green-600 bi bi-pencil-square hover:text-green-800"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z">
                                                                </path>
                                                                <path fill-rule="evenodd"
                                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z">
                                                                </path>
                                                            </svg>
                                                        </a>
                                                        {{-- @endcan --}}

                                                        {{-- @can('Delete role') --}}
                                                        <button wire:click.prevent="deleteModal(6)">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                                class="w-4 h-4 mr-3 text-red-600 bi bi-trash hover:text-red-800"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z">
                                                                </path>
                                                                <path fill-rule="evenodd"
                                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z">
                                                                </path>
                                                            </svg>
                                                        </button>
                                                        {{-- @endcan --}}
                                                    </div>
                                                @endif
                                            @endforeach
                                            <p></p>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>
    </x-app.card>
</x-app-layout>
