<?php

namespace App\Http\Livewire;

use App\Models\LabService;
use App\Models\LabServices;
use App\Models\TestService;
use Livewire\Component;

class DeletedTestServices extends Component
{
    public bool $isOpenRestore = false;
    public $lab_services;
    public $lab_service_id;

    public function openRestoreModal(int $id): void
    {
        $this->lab_service_id = $id;
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
        LabService::onlyTrashed()->where('id', $this->lab_service_id)->restore();
        $this->closeRestore();
        session()->flash('success', "Lab service has been restored.");
        return redirect()->to(route('lab-services.index'));
    }

    public function mount()
    {
        $this->lab_services = LabService::onlyTrashed()->get();
    }
    public function render()
    {
        return view('livewire.deleted-test-services');
    }
}
