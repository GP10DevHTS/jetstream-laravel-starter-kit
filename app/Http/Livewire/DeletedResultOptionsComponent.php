<?php

namespace App\Http\Livewire;

use App\Models\ResultOption;
use Livewire\Component;

class DeletedResultOptionsComponent extends Component
{
    public bool $isOpenRestore = false;
    public $result_options;
    public $result_option_id;

    public function openRestoreModal(int $id): void
    {
        $this->result_option_id = $id;
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
        ResultOption::onlyTrashed()->where('id', $this->result_option_id)->restore();
        $this->closeRestore();
        session()->flash('success', "Result option has been restored.");
        return redirect()->to(route('result-options.index'));
    }

    public function mount()
    {
        $this->result_options = ResultOption::onlyTrashed()->get();
    }
    public function render()
    {
        return view('livewire.deleted-result-options-component');
    }
}
