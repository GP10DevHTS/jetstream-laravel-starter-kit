<x-app-layout>
    <x-slot:title>
        Roles
    </x-slot:title>
    <x-app.card>
        <x-slot name="banner">
        </x-slot>
        <div>
            <div>
                @if ($errors->any())
                    <div class="p-4 bg-red-200 border border-red-400 rounded">
                        <x-jet-validation-errors class="mb-4" />
                    </div>
                @endif

                <form method="POST" action="{{ route('assign-roles.store') }}">
                    @csrf

                    <span class="mb-5 text-red-800 dark:text-red-300">Note: <span
                            class="text-gray-700 dark:text-gray-400">*
                            Denotes
                            Mandatory</span></span>

                    <div class="mt-8">
                        <!-- user-->
                        <div class="mt-4">
                            <x-jet-label for="user_id" value="{{ __('Users') }}" />
                            <select id="user_id" name="user_id"
                                class="block w-1/2 mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:border-gray-900 dark:bg-gray-700 dark:text-gray-400">
                                <option>--Select user--</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-jet-input-error for="user_id" />
                        </div>
                        <!-- /.user-->

                        <!-- role-->
                        <div class="mt-4">
                            <x-jet-label for="role_id" value="{{ __('Roles') }}" />
                            <select id="role_id" name="role_id"
                                class="block w-1/2 mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:border-gray-900 dark:bg-gray-700 dark:text-gray-400">
                                <option>--Select role--</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            <x-jet-input-error for="role_id" />
                        </div>
                        <!-- /.role-->

                    </div>
                    <div>
                        <x-jet-button class="mt-4">
                            {{ __('Assign Role') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>

        </div>
    </x-app.card>
</x-app-layout>
