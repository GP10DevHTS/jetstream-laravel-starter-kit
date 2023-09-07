<x-app-layout>
    <x-slot:title>
        <div class="flex">
            <div class="flex-1">
                Roles
            </div>
            <div>
                <x-app.back href="{{ route('roles.index') }}" />
            </div>
        </div>
    </x-slot:title>
    <x-app.card>
        <x-slot name="banner">
            <div class="flex">
                <div class="flex-1">
                    Roles
                </div>
                <div>
                    <x-app.back href="{{ route('roles.index') }}" />
                </div>
            </div>
        </x-slot>
        <div>
            @if ($errors->any())
                <div class="p-4 bg-red-200 border border-red-400 rounded">
                    <x-jet-validation-errors class="mb-4" />
                </div>
            @endif

            <form method="POST" action="{{ route('roles.store') }}">
                @csrf

                <span class="mb-5 text-red-800 dark:text-red-300">Note: <span class="text-gray-700 dark:text-gray-400">*
                        Denotes
                        Mandatory</span></span>

                <div class="mt-8">
                    <!-- role -->
                    <div class="mt-3 mb-3">
                        <x-jet-label for="name" value="{{ __('Role Name *') }}" />
                        <x-jet-input id="name" class="block w-1/2 mt-1" type="text" name="name"
                            :value="old('name')" autofocus autocomplete="name" />
                        <x-jet-input-error for="name" />
                    </div>
                    <!-- /.role -->
                </div>
                <div>
                    <x-jet-button class="mt-4">
                        {{ __('Add Role') }}
                    </x-jet-button>
                </div>
            </form>

        </div>
    </x-app.card>
</x-app-layout>
