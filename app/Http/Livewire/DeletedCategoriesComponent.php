<?php

namespace App\Http\Livewire;

use App\Models\Catagory;
use App\Models\ServiceCategory;
use Livewire\Component;
use Livewire\WithPagination;

class DeletedCategoriesComponent extends Component
{
    use WithPagination;

    public bool $isOpenRestore = false;
    public $categories;
    public $category_id;

    public function openRestoreModal(int $id): void
    {
        $this->category_id = $id;
        $this->openRestore();
    }

    public function openRestore(): void
    {
        $this->isOpenRestore = true;
    }

    public function closeRestore(): void
    {
        $this->isOpenRestore = false;
    }

    public function restore()
    {
        ServiceCategory::onlyTrashed()->where('id', $this->category_id)->restore();
        $this->closeRestore();
        session()->flash('success', "Service category has been restored.");
        return redirect()->to(route('service-categories.index'));
    }

    public function mount()
    {
        $this->categories = ServiceCategory::onlyTrashed()->get();
    }
    public function render()
    {
        return view('livewire.deleted-categories-component');
    }
}
