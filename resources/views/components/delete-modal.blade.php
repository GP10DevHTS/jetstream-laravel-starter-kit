<div>
    <div class="fixed inset-0 top-0 bottom-0 left-0 right-0 z-50 min-h-screen py-12 overflow-y-auto transition-opacity duration-150 ease-in-out bg-slate-900 bg-opacity-30"
        id="modal">
        <div role="alert" class="container w-11/12 max-w-lg mx-auto md:w-2/3">
            <div class="relative px-5 py-8 bg-white border border-gray-400 rounded shadow-md md:px-10">
                <div class="flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        class="p-2 text-red-500 bg-red-200 rounded-full w-9 h-9 bi bi-trash3" viewBox="0 0 16 16">
                        <path
                            d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                    </svg>
                </div>

                <div class="flex items-center justify-center">
                    {{ $content }}
                </div>

                <div class="flex items-center justify-center w-full">
                    {{ $footer }}
                </div>
            </div>
        </div>
    </div>
</div>
