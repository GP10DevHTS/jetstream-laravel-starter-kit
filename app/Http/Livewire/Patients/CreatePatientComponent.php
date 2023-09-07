<?php

namespace App\Http\Livewire\Patients;

use App\Models\LabService;
use App\Models\Patient;
use App\Models\PatientVisit;
use App\Models\TestOrder;
use App\Models\TestResult;
use App\Rules\LabServiceRule;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Arr;
use Yoeunes\Toastr\Facades\Toastr;

class CreatePatientComponent extends Component
{
    public Collection $lab_services;

    // patient
    public $full_name;

    public $gender;
    public $patient_days;
    public $patient_weeks;
    public $patient_months;
    public $patient_years;

    public $date_of_birth;
    public $phone_number;
    public $email;
    public $residence;

    public $temperature;
    public $weight;
    public $height;

    // next of kin
    public $kin_full_name;
    public $kin_gender;
    public $patient_relation;
    public $kin_phone_number;
    // public $kin_email;
    public $kin_residence;

    public $selectedBirthDate = NULL;
    public $selectedPeriod = NULL;

    public $lab_service_id;

    // collection
    public $birth_dates;
    public $periods;

    public $inputs = [];
    public $i      = 1;


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

    // run construct
    public function mount()
    {
        $this->birth_dates =  collect(['Date of birth', 'Age']);

        $this->periods = collect(['days', 'weeks', 'months', 'years']);

        $this->lab_services = LabService::all();
    }

    // generate unique patient number
    public function patient_number(): int
    {
        do {
            $number = random_int(100000, 999999);
        } while (Patient::where('patient_number', '=', $number)->first());
        return $number;
    }

    // generate unique order number
    public function order_number(): int
    {
        do {
            $number = random_int(100000, 999999);
        } while (TestResult::where('order_number', '=', $number)->first());
        return $number;
    }

    // store data
    public function storePatient()
    {
        $this->validate([
            // patient
            // 'lab_service_id' =>
            // [
            //     function ($attribute, $value, $fail) {
            //         if (!in_array($value, $this->lab_service_id)) {
            //             $fail('Lab service must be unique.');
            //         }
            //     },
            // ],
            'selectedBirthDate' => 'required',
            'full_name'         => 'required|min:3|string',
            'gender'            => 'required|min:3|string',
            'date_of_birth'     => 'sometimes|nullable|date',
            'phone_number'      => 'numeric|min:10',
            'email'             => 'sometimes|nullable|email',
            'residence'         => 'string|max:255',

            // patient visit
            // 'patient_days'     => 'sometimes|nullable|numeric|max:6',
            // 'patient_weeks'    => 'sometimes|nullable|numeric|max:3',
            // 'patient_months'   => 'sometimes|nullable|numeric|max:11',
            // 'patient_years'    => 'sometimes|nullable|numeric|max:140',
            'temperature'      => 'sometimes|nullable|numeric',
            'weight'           => 'sometimes|nullable|numeric',
            'height'           => 'sometimes|nullable|numeric',
            'kin_full_name'    => 'sometimes|nullable|min:3|string',
            'kin_gender'       => 'sometimes|nullable|min:3|string',
            'kin_phone_number' => 'sometimes|nullable|numeric|min:10',
            'kin_residence'    => 'sometimes|nullable|string|max:255',
        ], [
            'selectedBirthDate.required' => 'This field can not be empty. Select date of birth or age',
            // 'patient_days.max'           => 'The days must not be greater than 6. Change and enter weeks instead',
            // 'patient_weeks.max'          => 'The weeks must not be greater than 3. Change and enter months instead',
            // 'patient_months.max'         => 'The months must not be greater than 11. Change and enter years instead',
        ]);

        DB::transaction(function () {
            // create new patient
            $patient = Patient::create([
                'user_id'        => auth()->id(),
                'patient_number' => $this->patient_number(),
                'full_name'      => $this->full_name,
                'gender'         => $this->gender,
                'phone_number'   => $this->phone_number,
                'email'          => $this->email,
                'residence'      => $this->residence,
            ]);

            // create new patient visit
            $patient_visit = PatientVisit::create([
                'user_id'          => auth()->id(),
                'patient_id'       => $patient->id,
                // 'patient_age'      => $this->age,
                'temperature'      => $this->temperature,
                'weight'           => $this->weight,
                'height'           => $this->height,
                'kin_full_name'    => $this->kin_full_name,
                'kin_gender'       => $this->kin_gender,
                'kin_phone_number' => $this->kin_phone_number,
                'patient_relation' => $this->patient_relation,
                'kin_residence'    => $this->kin_residence,
            ]);

            // create an array of test order
            foreach ($this->lab_service_id as $key => $value) {
                $lab_service = LabService::where('id', $this->lab_service_id[$key])->first();
                TestResult::create([
                    'user_id'        => auth()->id(),
                    'patient_id'     => $patient->id,
                    'lab_service_id' => $this->lab_service_id[$key],
                    'order_number'   => $this->order_number(),
                    'lab_service_price' => $lab_service->price,
                ]);

                // store date of birth, weeks, months or years
                if (!is_null($this->date_of_birth)) {
                    $patient->update([
                        'date_of_birth' => $this->date_of_birth,
                    ]);
                } elseif (!is_null($this->patient_days)) {
                    $patient_visit->update([
                        'patient_days' => $this->patient_days,
                    ]);
                } elseif (!is_null($this->patient_weeks)) {
                    $patient_visit->update([
                        'patient_weeks' => $this->patient_weeks,
                    ]);
                } elseif (!is_null($this->patient_months)) {
                    $patient_visit->update([
                        'patient_months' => $this->patient_months,
                    ]);
                } elseif (!is_null($this->patient_years)) {
                    $patient_visit->update([
                        'patient_years' => $this->patient_years,
                    ]);
                }
            }
        });
        Toastr::success('Patient has been added.');
        return redirect()->to(route('patients.index'));
    }

    public function render()
    {
        return view('livewire.patients.create-patient-component');
    }
}
