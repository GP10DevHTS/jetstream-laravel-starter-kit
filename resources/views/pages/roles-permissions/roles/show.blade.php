<x-app-layout>
    <x-slot:title>

    </x-slot:title>
    <x-app.card>
        <x-slot name="banner">
            <div class="flex">
                <div class="flex-1">
                    Permissions to Role
                </div>
                <div class="flex">
                    <x-app.back href="{{ route('roles.index') }}" />

                    {{-- @can('Edit role permissions') --}}
                    <a href="{{ route('roles.edit', $role) }}"
                        class="flex px-2 mb-2 ml-4 text-white bg-green-300 rounded hover:bg-green-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            class="w-6 h-6 pt-2 bi bi-pencil-square" viewBox="0 0 16 16">
                            <path
                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                            <path fill-rule="evenodd"
                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                        </svg>
                        Edit
                    </a>
                    {{-- @endcan --}}
                </div>
            </div>
        </x-slot>
        <x-app.flash-message />
        <div>
            <div class="flex mt-10 border-t">
                <div class="px-4 py-2 text-base font-bold">Role:</div>
                <div class="px-4 py-2">{{ $role->name }}</div>
            </div>
            <div class="flex mt-2 border-t">
                <div class="px-4 py-2 text-base font-bold">Permissions:</div>
                <div class="px-4 py-2">
                    <ul class="grid grid-cols-3 gap-4">
                        @foreach ($role->permissions as $permission)
                            <li class="px-2 mb-1 mr-2 text-sm text-white bg-gray-500 rounded">{{ $permission->name }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        </div>
    </x-app.card>
</x-app-layout>
