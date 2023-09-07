<?php

namespace App\Http\Livewire;

use App\Models\LabServiceCategory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;
use Yoeunes\Toastr\Facades\Toastr;

class LabServiceCategoryComponent extends Component
{
    use WithPagination;

    public bool $isOpenCreate = false;
    public bool $isOpenEdit = false;
    public bool $isOpenDelete = false;

    public $perPage = 15;
    public $sortField = 'category_name';
    public $sortAsc = true;
    public $search = '';
    // sort by class
    public $sortCategory = 'All';

    public $service_category_id;
    public $category_name;
    public $description;

    protected $rules = [
        'category_name' => 'required|string|unique:lab_service_categories|min:2',
    ];

    // sort results based on either ascend or discend
    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }
        $this->sortField = $field;
    }

    public function openCreateModal(): void
    {
        $this->isOpenCreate = true;
    }

    public function closeModal(): void
    {
        $this->reset('category_name');
        $this->isOpenCreate = false;
    }

    public function store(): void
    {
        $this->validate();
        LabServiceCategory::create([
            'user_id' => auth()->id(),
            'category_name' => $this->category_name,
        ]);

        $this->closeModal();
        $this->reset('category_name');
        Toastr::success('Category has been added.');
    }

    public function storeCreateAnother(): void
    {
        $this->validate();
        LabServiceCategory::create([
            'user_id' => auth()->id(),
            'category_name' => $this->category_name,
        ]);

        $this->reset('category_name');
        Toastr::success('Category has been added.');
    }

    public function openEditModal(int $id): void
    {
        $service_category = LabServiceCategory::where('id', $id)->first();

        $this->service_category_id   = $id;
        $this->category_name = $service_category->category_name;
        $this->description = $service_category->description;

        $this->openEdit();
    }

    public function openEdit(): void
    {
        $this->isOpenEdit = true;
    }

    public function closeEdit(): void
    {
        $this->reset('category_name');
        $this->isOpenEdit = false;
    }

    public function updatePatient(): void
    {
        $this->validate([
            'category_name' => 'sometimes|required|string|min:2',
        ]);

        if ($this->service_category_id) {
            $service_category = LabServiceCategory::find($this->service_category_id);

            $service_category->update([
                'user_id' => auth()->id(),
                'category_name' => $this->category_name,
            ]);

            $this->reset('category_name');
            $this->closeEdit();
        }

        Toastr::success("{$service_category->category_name} has been updated.");
    }

    public function openDeleteModal(int $id): void
    {
        $this->service_category_id = $id;
        $this->openDelete();
    }

    public function openDelete(): void
    {
        $this->isOpenDelete = true;
    }

    public function closeDelete(): void
    {
        $this->isOpenDelete = false;
    }

    public function delete(): void
    {
        $service_category = LabServiceCategory::find($this->service_category_id)->delete();
        $this->closeDelete();
        Toastr::success('Category has been deleted.');
    }



    public function render(): View
    {
        // order results about on either ascending or discending order
        $lab_service_categories = LabServiceCategory::search($this->search)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
        return view('livewire.lab-service-category-component', compact('lab_service_categories'));
    }
}
