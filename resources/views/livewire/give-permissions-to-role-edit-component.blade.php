<div>
    @if ($errors->any())
        <div class="p-4 bg-red-200 border border-red-400 rounded">
            <x-validation-errors class="mb-4" />
        </div>
    @endif

    <form method="POST" action="{{ route('roles.store-permissions') }}">
        @csrf

        <span class="mb-5 text-red-800 dark:text-red-300">Note: <span class="text-gray-700 dark:text-gray-400">*
                Denotes
                Mandatory</span></span>

        <div class="mt-8">
            <!-- role-->
            <div class="mt-4">
                <x-label for="role_id" value="{{ __('Role') }}" />
                <select id="role_id" name="role_id" wire:model="roles"
                    class="block w-1/2 mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:border-gray-900 dark:bg-gray-700 dark:text-gray-400">
                    <option>--Select a role--</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                <x-input-error for="role_id" />
            </div>
            <!-- /.role-->
            <div class="border border-t my-4 mb-12"></div>

            <div class="text-base mb-4 text-center border border-red-200 bg-red-50 rounded px-2 py-1">
                <span class="text-red-500">Note:</span> Please check all the permissions you want to assign to this
                role.
                If all checked all
                permissions will
                be granted to this role.
            </div>

            {{-- <div class="flex mb-3">
                <x-checkbox id="checked" class="mr-2 mt-1" wire:model="SelectedPermissions" />
                <x-label for="checked" value="Give Full Permissions" />
                <div></div>
            </div> --}}

            <div class="grid grid-cols-3 gap-4">
                @foreach ($modules as $module)
                    <div class="border p-4 rounded-md shadow-md bg-gray-50">
                        <div class="font-bold mb-4">
                            {{ $module->name }}
                        </div>
                        <div>
                            <ul class="list-none">
                                @foreach ($module->permissions as $permission)
                                    <div class="flex my-4 pl-2">
                                        <x-checkbox id="{{ $permission->id }}" class="mr-2 mt-1" name="permissions[]"
                                            value="{{ $permission->id }}" />
                                        <li>
                                            <x-label for="{{ $permission->id }}" value="{{ $permission->name }}" />
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
            <x-button class="mt-4">
                {{ __('Assign Permissions') }}
            </x-button>
        </div>
    </form>
</div>
