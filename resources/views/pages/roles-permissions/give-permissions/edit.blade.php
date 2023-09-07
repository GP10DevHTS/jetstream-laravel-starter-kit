<x-app-layout>
    <x-slot:title>
        Roles
    </x-slot:title>
    <x-app.card>
        <x-slot name="banner">
            Roles
        </x-slot>
        <div>
            <div>
                @if ($errors->any())
                    <div class="p-4 bg-red-200 border border-red-400 rounded">
                        <x-jet-validation-errors class="mb-4" />
                    </div>
                @endif

                <form method="POST" action="{{ route('roles.update-permissions', $role) }}">
                    @csrf
                    @method('put')

                    <span class="mb-5 text-red-800 dark:text-red-300">Note: <span
                            class="text-gray-700 dark:text-gray-400">*
                            Denotes
                            Mandatory</span></span>

                    <div class="mt-8">
                        <!-- role-->
                        <div class="mt-4">
                            <x-jet-label for="role_id" value="{{ __('Role') }}" />
                            <select id="role_id" name="role_id" wire:model="roles"
                                class="block w-1/2 mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:border-gray-900 dark:bg-gray-700 dark:text-gray-400">
                                <option value="{{ $role->id }}">{{ $role->name }}
                                </option>
                            </select>
                            <x-jet-input-error for="role_id" />
                        </div>
                        <!-- /.role-->
                        <div class="my-4 mb-12 border border-t"></div>

                        <div class="px-2 py-1 mb-4 text-base text-center border border-red-200 rounded bg-red-50">
                            <span class="text-red-500">Note:</span> Please check all the permissions you want to assign
                            to this
                            role.
                            If all checked all
                            permissions will
                            be granted to this role.
                        </div>

                        <div class="grid grid-cols-3 gap-4">
                            @foreach ($modules as $module)
                                <div class="p-4 border rounded-md shadow-md bg-gray-50">
                                    <div class="mb-4 font-bold">
                                        {{ $module->name }}
                                    </div>
                                    <div>
                                        <ul class="list-none">
                                            @foreach ($module->permissions as $permission)
                                                <div class="flex pl-2 my-4">
                                                    @if (in_array($permission->id, $role_permissions))
                                                        <x-jet-checkbox id="{{ $permission->id }}" class="mt-1 mr-2"
                                                            name="permissions[]" value="{{ $permission->id }}"
                                                            checked />
                                                    @else
                                                        <x-jet-checkbox id="{{ $permission->id }}" class="mt-1 mr-2"
                                                            name="permissions[]" value="{{ $permission->id }}" />
                                                    @endif
                                                    <li>
                                                        <x-jet-label for="{{ $permission->id }}"
                                                            value="{{ $permission->name }}" />
                                                    </li>
                                                </div>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div>
                        <x-jet-button class="mt-4">
                            {{ __('Update Permissions') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>

        </div>
    </x-app.card>
</x-app-layout>
