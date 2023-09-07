<?php

namespace App\Http\Livewire\Laboratory;

use App\Models\LabService;
use App\Models\Patient;
use App\Models\ResultOption;
use App\Models\Spacemen;
use App\Models\TestResult;
use Livewire\Component;
use Livewire\WithPagination;
use Yoeunes\Toastr\Facades\Toastr;
use Illuminate\Support\Str;

class TestResultComponent extends Component
{
    use WithPagination;

    public bool $isOpenReceiveTestOrder = FALSE;
    public bool $isOpenAddSpacemen      = FALSE;
    public bool $isOpenAddResult        = FALSE;

    public $patients;
    public $specimens;
    public $lab_services;
    public $selectedService = NULL;
    public $service;
    public $service_id;
    public $service_name;
    public $result_options;
    public $sample_collection_date;
    public $sample_received_date;
    public $sample_test_date;
    public $patient;
    public $test_result;
    public $test_results;
    public $result_option_id;
    public $comment;

    public $test_result_id;
    public $patient_id;
    public $spacemen_id;

    public $inputs = [];
    public $i      = 1;

    // event listeners
    protected $listeners = [
        'addSpacemen'            => '$refresh',
        'addResult'              => '$refresh',
        'updatedSelectedService' => '$refresh',
    ];

    // add new field
    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs, $i);
    }

    // remove the field
    public function remove($i)
    {
        unset($this->inputs[$i]);
    }

    // constructor
    public function mount(): void
    {
        $this->patients       = Patient::with('test_results')->latest()->get();
        $this->specimens      = Spacemen::all();
        $this->lab_services   = LabService::all();
        $this->result_options = collect();
    }

    // open modal and receive orders
    public function openReceiveTestOrder(int $id): void
    {
        $test_result = TestResult::where('id', $id)->first();
        $this->test_result_id   = $id;

        $this->isOpenReceiveTestOrder = true;
    }

    // close receive orders
    public function closeReceiveTestOrder(): void
    {
        $this->isOpenReceiveTestOrder = false;
    }


    // receive orders
    public function receiveOrder(): void
    {
        if ($this->test_order_id) {
            $test_order = TestResult::find($this->test_order_id);

            $test_order->update([
                'user_id'      => auth()->id(),
                'order_status' => 'received',
            ]);
            $test_order = TestResult::find($this->test_order_id);


            TestResult::create([
                'test_result_id' => $test_order->id,
                'patient_id'     => $test_order->patient->id,
            ]);

            // send notification
            Toastr::success('Test order has been received.');
            // refresh component
            $this->emitSelf('receiveOrder');
            // close the modal
            $this->closeReceiveTestOrder();
        }
    }


    // open modal for adding specimen
    public function openAddSpacemenModal(int $id): void
    {
        $test_result = TestResult::where('id', $id)->first();

        $this->test_result_id = $id;
        $this->service   = $test_result;

        $this->isOpenAddSpacemen = true;
    }

    // close the modal 
    public function closeAddSpacemen(): void
    {
        $this->isOpenAddSpacemen = false;
    }

    // add specimen to database
    public function addSpacemen(): void
    {
        // perform validations
        $this->validate([
            'spacemen_id' => 'required',
        ], [
            'spacemen_id.required' => 'Specimen is required.',
        ]);

        // generate a random string and save to the database
        if ($this->test_result_id) {
            $test_identity = strtoupper(Str::random(6));
            $test_result = TestResult::find($this->test_result_id);
            $test_result->update([
                'test_identity' => $test_identity,
            ]);

            // perform many to many submittion
            $test_result->spacemens()->attach($this->spacemen_id);

            Toastr::success('Specimen has been added.');
            $this->emitSelf('addSpacemen');
            $this->reset('spacemen_id');
            $this->closeAddSpacemen();
        }
    }


    // fetch the option based on the service they are associated with
    public function updatedSelectedService($id)
    {
        if (!is_null($id)) {
            $this->test_result = TestResult::where('id', $id)->first();
        }
        $this->emitSelf('updatedSelectedService');
    }

    // open modal to add results
    public function openAddResultModal(int $id): void
    {
        $test_result          = TestResult::where('id', $id)->first();

        $this->test_result_id = $id;
        $this->service_id     = $test_result->lab_service->id;
        $this->service_name   = $test_result->lab_service->service_name;

        $this->isOpenAddResult = TRUE;

        $this->reset('selectedService');
    }

    // close the modal
    public function closeAddResult(): void
    {
        $this->isOpenAddResult = FALSE;
    }

    // add results from the tests
    public function addResult(): void
    {
        // perform validation
        $this->validate([
            'selectedService'        => 'required',
            'result_option_id'       => 'required',
            'sample_collection_date' => 'required',
            'sample_received_date'   => 'required',
            'sample_test_date'       => 'required',
        ], [
            'result_option_id.required' => 'Result is required.',
        ]);

        // update row
        if ($this->test_result_id) {
            $test_result = TestResult::find($this->test_result_id);

            $test_result->update([
                'result_option_id'       => $this->result_option_id,
                'sample_collection_date' => $this->sample_collection_date,
                'sample_received_date'   => $this->sample_received_date,
                'sample_test_date'       => $this->sample_test_date,
                'comment'                => $this->comment,
                'staff_id'               => auth()->id(),
            ]);

            $this->emitSelf('addResult');
            $this->reset('result_option_id', 'comment', 'sample_collection_date', 'sample_received_date', 'sample_test_date');
            toastr()
                ->success("<b>{$test_result->lab_service->service_name}</b> results for <b>{$test_result->patient->full_name}</b> has been added.");
        }
        $this->closeAddResult();
    }

    public function render()
    {
        return view('livewire.laboratory.test-result-component');
    }
}
