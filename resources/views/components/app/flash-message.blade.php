@if (session('success'))
    <div x-data="{ isOpen: true }" class="mb-3">
        <div class="flex px-2 py-2 font-medium text-green-700 bg-green-100 border border-green-300 rounded-md"
            x-show="isOpen">
            <div slot="avatar">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="w-5 h-5 mx-2 feather feather-check-circle">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
            </div>
            <div class="flex-1 text-xl font-normal">
                <span class="ml-4 font-semibold">Success: </span>
                <span>{{ session('success') }}</span>
            </div>

            <div x-on:click="isOpen=false" class="px-2 mr-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="w-5 h-5 ml-2 border border-green-700 rounded-full cursor-pointer feather feather-x hover:text-green-400 hover:border-green-400">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </div>
        </div>
    </div>
@elseif(session('error'))
    <div x-data="{ isOpen: true }" class="mb-3">
        <div class="flex px-2 py-2 font-medium text-red-700 bg-red-100 border border-red-300 rounded-md"
            x-show="isOpen">
            <div slot="avatar">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="w-5 h-5 mx-2 feather feather-check-circle">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
            </div>
            <div class="flex-1 text-xl font-normal">
                <span class="ml-4 font-semibold">Error: </span>
                <span>{{ session('error') }}</span>
            </div>

            <div x-on:click="isOpen=false" class="px-2 mr-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="w-5 h-5 ml-2 border border-red-700 rounded-full cursor-pointer feather feather-x hover:text-red-400 hover:border-red-400">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </div>
        </div>
    </div>
@elseif(session('info'))
    <div x-data="{ isOpen: true }" class="mb-3">
        <div class="flex px-2 py-2 font-medium text-blue-700 bg-blue-100 border border-blue-300 rounded-md"
            x-show="isOpen">
            <div slot="avatar">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="w-5 h-5 mx-2 feather feather-check-circle">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
            </div>
            <div class="flex-1 text-xl font-normal">
                <span class="ml-4 font-semibold">Info: </span>
                <span>{{ session('info') }}</span>
            </div>

            <div x-on:click="isOpen=false" class="px-2 mr-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round"
                    class="w-5 h-5 ml-2 border border-blue-700 rounded-full cursor-pointer feather feather-x hover:text-blue-400 hover:border-blue-400">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </div>
        </div>
    </div>
@endif
