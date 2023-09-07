<x-app-layout>
    <x-slot name="title">
        Roles
    </x-slot>
    <x-app.card>
        <x-slot name="banner">
            Roles List
        </x-slot>
        <div>
            <x-app.flash-message />

            <div class="flex flex-col my-2 sm:flex-row">
                <div class="flex flex-row mb-1 sm:mb-0">
                    <div class="relative">
                        {{-- @can('Add role') --}}
                        <a href="{{ route('roles.create') }}"
                            class="flex pl-3 text-gray-500 hover:text-gray-900 hover:underline">
                            <span class="mr-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6 bi bi-plus"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                </svg>
                            </span>
                            Add Role
                        </a>
                        {{-- @endcan --}}
                    </div>
                </div>

                <div class="flex flex-row mb-1 sm:mb-0">
                    <div class="relative">
                        {{-- @can('Add permission to a role') --}}
                        <a href="{{ route('roles.give-permissions') }}"
                            class="flex pl-3 text-gray-500 hover:text-gray-900 hover:underline">
                            <span class="mr-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6 bi bi-plus"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                </svg>
                            </span>
                            Add Permissions To A Role
                        </a>
                        {{-- @endcan --}}
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-4 mt-8">
                @foreach ($roles as $role)
                    @if ($role->permissions->isNotEmpty())
                        <a href="{{ route('roles.show', $role) }}" class="">
                            <div class="border p-4 rounded-md shadow-md mb-4 hover:bg-gray-100 bg-gray-50">
                                <div class="font-bold">
                                    {{ $role->name }}
                                </div>
                                <div class="font-extralight text-xs">
                                    @if ($role->permissions->isNotEmpty())
                                        <span class="font-bold">{{ __('(Click to view permissions)') }}</span>
                                    @else
                                        {{ __('No permissions yet') }}
                                    @endif
                                </div>
                            </div>
                        </a>
                    @else
                        <div class="border p-4 rounded-md shadow-md bg-gray-50 mb-4">
                            <div class="font-bold">
                                {{ $role->name }}
                            </div>
                            <div class="font-thin text-xs">
                                @if ($role->permissions->isEmpty())
                                    {{ __('No permissions yet') }}
                                @endif
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </x-app.card>
</x-app-layout>
