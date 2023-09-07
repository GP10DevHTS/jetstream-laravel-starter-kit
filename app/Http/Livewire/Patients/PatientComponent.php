<?php

namespace App\Http\Livewire\Patients;

use App\Models\Patient;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;
use Yoeunes\Toastr\Facades\Toastr;

class PatientComponent extends Component
{
    use WithPagination;

    public bool $isOpenCreate = false;
    public bool $isOpenEdit = false;
    public bool $isOpenDelete = false;

    public $perPage = 15;
    public $sortField = 'patient_number';
    public $sortAsc = true;
    public $search = '';
    // sort by class
    public $sortPatient = 'All';

    public $patient_id;
    public $full_name;
    public $gender;
    public $phone_number;
    public $residence;
    public $email;

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
        $this->reset('full_name', 'gender', 'phone_number', 'email', 'residence');
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


    public function openEditModal(int $id): void
    {
        $patient = Patient::where('id', $id)->first();

        $this->patient_id   = $id;
        $this->full_name    = $patient->full_name;
        $this->gender       = $patient->gender;
        $this->phone_number = $patient->phone_number;
        $this->email        = $patient->email;
        $this->residence    = $patient->residence;

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
            'full_name'    => 'required|string',
            'gender'       => 'required|string',
            'phone_number' => 'required',
            'residence'    => 'required|string',
        ]);

        if ($this->patient_id) {
            $patient = Patient::find($this->patient_id);

            $patient->update([
                'full_name'    => $this->full_name,
                'gender'       => $this->gender,
                'phone_number' => $this->phone_number,
                'email'        => $this->email,
                'residence'    => $this->residence,
            ]);

            $this->resetData();
            $this->closeEdit();
        }

        Toastr::success('Patient information has been update.');
    }

    public function openDeleteModal(int $id): void
    {
        $this->patient_id = $id;
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
        $patient = Patient::find($this->patient_id)->delete();
        $this->closeDelete();
        Toastr::success("Patient has been deleted.");
    }

    public function render()
    {
        $patients = Patient::search($this->search)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);

        return view('livewire.patients.patient-component', compact('patients'));
    }
}
