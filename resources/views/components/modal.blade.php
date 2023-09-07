<div>
    <div class="fixed inset-0 top-0 bottom-0 left-0 right-0 z-50 min-h-screen py-12 overflow-y-auto transition-opacity duration-150 ease-in-out bg-slate-900 bg-opacity-30"
        id="modal">
        <div role="alert" class="container w-11/12 max-w-lg mx-auto md:w-2/3">
            <div class="relative px-5 py-8 bg-white border border-gray-400 rounded shadow-md md:px-10">
                <div>
                    <h1 class="mb-4 font-bold leading-tight tracking-normal text-gray-800 font-lg">
                        {{ $title }}
                    </h1>
                    <hr />
                    <div class="mb-4"></div>
                </div>

                <div>
                    {{ $content }}
                </div>

                <div class="my-4"></div>

                <div class="flex items-center justify-start w-full">
                    {{ $footer }}
                </div>
            </div>
        </div>
    </div>
</div>
