<?php

namespace App\Http\Livewire;

use App\Models\LabService;
use App\Models\LabServiceCategory;
use App\Models\ResultOption;
use Livewire\Component;
use Livewire\WithPagination;
use Yoeunes\Toastr\Facades\Toastr;

class LabServiceComponent extends Component
{
    use WithPagination;

    public bool $isOpenCreate = false;
    public bool $isOpenEdit = false;
    public bool $isOpenDelete = false;
    public bool $isOpenNewCategory = false;

    public $perPage = 15;
    public $sortField = 'service_name';
    public $sortAsc = true;
    public $search = '';
    // sort by class
    public $sortCategory = 'All';

    public $lab_service_category_id;
    public $result_option_id;
    public $service_name;
    public $price;
    public $lab_service_id;
    public $category_name;

    public $categories;
    public $result_options;

    public $inputs = [];
    public $i = 1;

    protected $listeners = [
        'storeServiceCategory' => '$refresh',
        'openCreateModal'      => '$refresh',
        'store'                => '$refresh',
    ];

    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs, $i);
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
    }

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
    public function resetData()
    {
        $this->reset('lab_service_category_id', 'service_name', 'result_option_id', 'price');
    }

    public function openCreateModal()
    {
        $this->isOpenCreate = true;

        // $this->emitSelf('openCreateModal');
        $this->emitSelf('storeServiceCategory');
    }

    public function closeModal()
    {
        $this->resetData();
        $this->isOpenCreate = false;
    }

    public function newCategoryModal(): void
    {
        $this->isOpenNewCategory = true;
        $this->emitSelf('storeServiceCategory');
    }

    public function closeNewCategoryModal()
    {
        $this->isOpenNewCategory = false;
    }

    public function storeServiceCategory(): void
    {
        $this->validate(['category_name' => 'required']);
        LabServiceCategory::create([
            'user_id'       => auth()->id(),
            'category_name' => $this->category_name,
        ]);

        $this->reset('category_name');
        $this->emitSelf('storeServiceCategory');
        $this->closeNewCategoryModal();
        Toastr::success('Lab service has been added.');
    }

    public function store()
    {
        $this->validate([
            'lab_service_category_id' => 'required',
            'service_name'            => 'required|string|min:1|unique:lab_services',
            'price'                   => 'required|numeric',
            // 'result_option_id.0' => 'required|unique:lab_services',
            // 'result_option_id.*' => 'required|unique:lab_services',
        ], [
            'lab_service_category_id.required' => 'The lab service category field is required.'
            // 'result_option_id.0.required' => 'Result option is required.',
            // 'result_option_id.*.required' => 'Result option is required.'
        ]);

        $lab_service = LabService::create([
            'user_id'                 => auth()->id(),
            'lab_service_category_id' => $this->lab_service_category_id,
            'service_name'            => $this->service_name,
            'price'                   => $this->price,
        ]);
        $lab_service->result_options()->attach($this->result_option_id);

        $this->resetData();
        $this->closeModal();
        Toastr::success('Lab service has been added.');
    }
    public function storeCreateAnother()
    {
        $this->validate([
            'lab_service_category_id' => 'required',
            'service_name'            => 'required|string|min:1|unique:lab_services',
            'price'                   => 'required|numeric',
            // 'result_option_id.0' => 'required|unique:lab_services',
            // 'result_option_id.*' => 'required|unique:lab_services',
        ], [
            // 'result_option_id.0.required' => 'Result option is required.',
            // 'result_option_id.*.required' => 'Result option is required.'
        ]);

        $lab_service = LabService::create([
            'user_id'                 => auth()->id(),
            'lab_service_category_id' => $this->lab_service_category_id,
            'service_name'            => $this->service_name,
            'price'                   => $this->price,
        ]);
        $lab_service->result_options()->attach($this->result_option_id);

        $this->resetData();
        Toastr::success('Lab service has been added.');
    }

    public function openEditModal(int $id): void
    {
        $lab_service = LabService::where('id', $id)->first();

        $this->lab_service_id          = $id;
        $this->lab_service_category_id = $lab_service->lab_service_category_id;
        $this->service_name            = $lab_service->service_name;
        $this->price                   = $lab_service->price;

        $this->openEdit();
    }

    public function openEdit(): void
    {
        $this->isOpenEdit = true;
    }

    public function closeEdit(): void
    {
        $this->resetData();
        $this->isOpenEdit = false;
    }

    public function update(): void
    {
        $this->validate([
            'lab_service_category_id' => 'required',
            'service_name'            => 'required|string|min:1',
            'price'                   => 'required|integer',
        ]);

        if ($this->lab_service_id) {
            $lab_service = LabService::find($this->lab_service_id);

            $lab_service->update([
                'user_id'                 => auth()->id(),
                'lab_service_category_id' => $this->lab_service_category_id,
                'service_name'            => $this->service_name,
                'price'                   => $this->price,
            ]);

            $this->resetData();
            $this->closeEdit();
        }

        Toastr::success("{$lab_service->service_name} has been updated.");
    }

    public function openDeleteModal(int $id): void
    {
        $this->lab_service_id = $id;
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
        LabService::find($this->lab_service_id)->delete();
        $this->closeDelete();
        Toastr::success('Lab service has been deleted.');
    }

    public function mount(): void
    {
        $this->result_options = ResultOption::all();
        $this->categories = LabServiceCategory::all();
    }

    public function render()
    {
        // order results about on either ascending or discending order
        $lab_services = LabService::search($this->search)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);

        return view('livewire.lab-service-component', compact('lab_services'));
    }
}
