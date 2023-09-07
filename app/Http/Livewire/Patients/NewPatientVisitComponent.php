<?php

namespace App\Http\Livewire\Patients;

use App\Models\LabService;
use App\Models\PatientVisit;
use App\Models\TestOrder;
use App\Models\TestResult;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Yoeunes\Toastr\Facades\Toastr;

class NewPatientVisitComponent extends Component
{
    use WithPagination;

    public bool $isOpenCreateTestOrder = FALSE;
    public bool $isOpenCreateNewVisit  = FALSE;
    public bool $isOpenEditService     = FALSE;
    public bool $isOpenDeleteService   = FALSE;

    public $lab_services;
    public $lab_service_id;
    public $patient;
    public $temperature;
    public $weight;
    public $height;
    public $kin_full_name;
    public $kin_gender;
    public $kin_phone_number;
    public $kin_residence;
    public $patient_relation;
    public $test_results_id;

    protected $listeners = [
        'storeTestOrder' => '$refresh',
        'storeNewVisit' => '$refresh',
    ];

    // test order
    public function openCreateTestOrderModal()
    {
        $this->isOpenCreateTestOrder = true;
    }

    public function closeTestOrderModal()
    {
        $this->isOpenCreateTestOrder = false;
    }

    // new visit
    public function openCreateNewVisitModal()
    {
        $this->isOpenCreateNewVisit = true;
    }

    public function closeNewVisitModal()
    {
        $this->isOpenCreateNewVisit = false;
    }

    public function order_number(): int
    {
        do {
            $number = random_int(100000, 999999);
        } while (TestResult::where('order_number', '=', $number)->first());
        return $number;
    }

    public function mount(): void
    {
        $this->lab_services = LabService::all();
    }
    public function storeTestOrder(): void
    {
        $this->validate([
            'lab_service_id' => 'required',
        ], [
            'lab_service_id.required' => 'Lab service is required'
        ]);

        TestResult::create([
            'user_id'        => auth()->id(),
            'patient_id'     => $this->patient->id,
            'lab_service_id' => $this->lab_service_id,
            'order_number'   => $this->order_number()
        ]);

        $this->emitSelf('storeTestOrder');
        $this->reset('lab_service_id');
        $this->closeTestOrderModal();
        Toastr::success('New test order added.');
    }

    public function storeNewVisit(): void
    {
        $this->validate([
            'lab_service_id' => 'required',
        ], ['lab_service_id.required' => 'Lab service is required']);

        DB::transaction(function () {
            PatientVisit::create([
                'user_id'          => auth()->id(),
                'patient_id'       => $this->patient->id,
                'temperature'      => $this->temperature,
                'weight'           => $this->weight,
                'height'           => $this->height,
                'kin_full_name'    => $this->kin_full_name,
                'kin_gender'       => $this->kin_gender,
                'patient_relation' => $this->patient_relation,
                'kin_phone_number' => $this->kin_phone_number,
                'kin_residence'    => $this->kin_residence,
            ]);


            TestResult::create([
                'user_id'        => auth()->id(),
                'patient_id'     => $this->patient->id,
                'lab_service_id' => $this->lab_service_id,
                'order_number'   => $this->order_number()
            ]);
        });

        $this->emitSelf('storeTestOrder');
        $this->reset('lab_service_id');
        $this->closeNewVisitModal();
        Toastr::success('Patient visit and test order has been added.');
    }

    public function openEditModal(int $id): void
    {
        $test_result = TestResult::where('id', $id)->first();

        $this->test_results_id = $id;
        $this->lab_service_id  = $test_result->lab_service_id;

        $this->isOpenEditService = TRUE;
    }

    public function closeTestResult(): void
    {
        $this->isOpenEditService = FALSE;
    }

    public function updateTestResult(): void
    {
        if ($this->test_results_id) {
            $test_result = TestResult::find($this->test_results_id);
            $test_result->update([
                'lab_service_id' => $this->lab_service_id,
            ]);
        }
        $this->closeTestResult();
        Toastr::success("Test order has been updated.");
    }

    public function openDeleteModal(): void
    {
        $this->isOpenDeleteService = TRUE;
    }

    public function closeTestResultDelete(): void
    {
        $this->isOpenDeleteService = FALSE;
    }

    public function deleteTestResult(): void
    {
        TestResult::find($this->test_results_id)->delete();
        $this->closeTestResultDelete();
        Toastr::success("Order has been deleted.");
    }

    public function render()
    {
        $test_results = TestResult::where('patient_id', $this->patient->id)->latest()->paginate(4);
        return view('livewire.patients.new-patient-visit-component', compact('test_results'));
    }
}
