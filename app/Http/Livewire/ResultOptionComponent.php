<?php

namespace App\Http\Livewire;

use App\Models\ResultOption;
use Livewire\Component;
use Livewire\WithPagination;
use Yoeunes\Toastr\Facades\Toastr;

class ResultOptionComponent extends Component
{
    use WithPagination;

    public bool $isOpenCreate = false;
    public bool $isOpenEdit = false;
    public bool $isOpenDelete = false;

    public $perPage = 15;
    public $sortField = 'option';
    public $sortAsc = true;
    public $search = '';
    // sort by class
    public $sortPatient = 'All';

    public $option;
    public $code;
    public $symbol;
    public $result_option_id;

    public $selectedResultOptions = [];
    public $selectAll             = false;
    public $bulkDisabled          = true;

    // validation
    protected $rules = [
        'option' => 'required|string|unique:result_options',
        'code'   => 'required|string',
        'symbol' => 'required|string|min:1',
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

    public function resetData()
    {
        $this->reset('option', 'code', 'symbol');
    }

    public function openCreateModal()
    {
        $this->isOpenCreate = true;
    }

    public function closeModal()
    {
        $this->resetData();
        $this->isOpenCreate = false;
    }

    public function store()
    {
        $this->validate();
        ResultOption::create([
            'user_id' => auth()->id(),
            'option' => $this->option,
            'code' => $this->code,
            'symbol' => $this->symbol,
        ]);

        $this->resetData();
        $this->closeModal();
        Toastr::success('Result option has been added.');
    }

    public function storeCreateAnother()
    {
        $this->validate();
        ResultOption::create([
            'user_id' => auth()->id(),
            'option' => $this->option,
            'code' => $this->code,
            'symbol' => $this->symbol,
        ]);

        $this->resetData();
        Toastr::success('Result option has been added.');
    }

    public function openEditModal(int $id): void
    {
        $result_option = ResultOption::where('id', $id)->first();

        $this->result_option_id   = $id;
        $this->option = $result_option->option;
        $this->code = $result_option->code;
        $this->symbol = $result_option->symbol;

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
            'option' => 'required|string',
            'code' => 'required|string',
            'symbol' => 'required|string|max:1',
        ]);

        if ($this->result_option_id) {
            $result_option = ResultOption::find($this->result_option_id);

            $result_option->update([
                'user_id' => auth()->id(),
                'option' => $this->option,
                'code' => $this->code,
                'symbol' => $this->symbol,
            ]);

            $this->resetData();
            $this->closeEdit();
        }

        Toastr::success("{$result_option->option} has been updated.");
    }

    public function openDeleteModal(int $id): void
    {
        $this->result_option_id = $id;
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
        ResultOption::find($this->result_option_id)->delete();
        $this->closeDelete();
        Toastr::success('Result option has been deleted.');
    }

    // delete bulk
    public function deleteSelected(): void
    {
        ResultOption::query()
            ->whereIn('id', $this->selectedResultOptions)
            ->delete();
        $this->selectedResultOptions = [];
        $this->selectAll = false;
    }

    public function updatedSelectAll($value): void
    {
        if ($value) {
            $this->selectedResultOptions = ResultOption::pluck('id');
            $this->bulkDisabled = false;
        } else {
            $this->selectedResultOptions = [];
            $this->bulkDisabled = true;
        }
    }

    public function render()
    {
        $result_options = ResultOption::search($this->search)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
        return view('livewire.result-option-component', compact('result_options'));
    }
}
