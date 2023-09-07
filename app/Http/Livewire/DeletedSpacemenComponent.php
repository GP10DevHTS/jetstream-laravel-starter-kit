<?php

namespace App\Http\Livewire;

use App\Models\Spacemen;
use Livewire\Component;

class DeletedSpacemenComponent extends Component
{
    public bool $isOpenRestore = false;
    public $spacemens;
    public $spacemen_id;

    public function openRestoreModal(int $id): void
    {
        $this->spacemen_id = $id;
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
        Spacemen::onlyTrashed()->where('id', $this->spacemen_id)->restore();
        $this->closeRestore();
        session()->flash('success', "Spacemen has been restored.");
        return redirect()->to(route('spacemen.index'));
    }

    public function mount()
    {
        $this->spacemens = Spacemen::onlyTrashed()->get();
    }

    public function render()
    {
        return view('livewire.deleted-spacemen-component');
    }
}
