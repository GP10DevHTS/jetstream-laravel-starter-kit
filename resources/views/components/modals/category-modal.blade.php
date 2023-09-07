@if ($isOpenCreate)
    <x-dialog :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
        <div class="px-6 py-4">
            <div class="text-lg font-medium text-slate-900 dark:text-slate-100">
                title
            </div>

            <div class="mt-4">
                content
            </div>
        </div>

        <div class="flex flex-row justify-end px-6 py-4 bg-slate-100 dark:bg-slate-900/20 text-right">
            footer
        </div>
    </x-dialog>
@endif