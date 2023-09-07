<x-app-layout>
    <x-slot name="title">
        Permissions
    </x-slot>
    <x-app.card>
        <x-slot:banner></x-slot:banner>

        <div class="grid grid-cols-3 gap-4">
            @foreach ($modules as $module)
                <div class="border p-4 rounded-md shadow-md bg-gray-50">
                    <div class="font-bold mb-4">
                        {{ $module->name }}
                    </div>
                    <div>
                        <ul class="list-none">
                            @foreach ($module->permissions as $permission)
                                <li class="mb-2 bg-gray-200 pl-2">{{ $permission->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </x-app.card>
</x-app-layout>
