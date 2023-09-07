<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Models\Patient;
use App\Models\VisitInfo;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientsController extends Controller
{
    // view a list of patients
    public function index(): View
    {
        // allow authorization
        $this->authorize('view patient module');
        return view('pages.patients.index');
    }

    // display page for adding a new patient
    public function create(): View
    {
        $this->authorize('add patient');
        return view('pages.patients.create');
    }

    // store patient info in database
    public function store(Request $request): RedirectResponse
    {
        // validate inputs
        $this->validate($request, [
            'full_name' => ['required', 'min:3'],
            'registration_number' => ['required', 'unique:patients'],
            'phone_number' => ['numeric', 'min:10'],
            'gender' => 'required',
            'birth_date' => 'sometimes',
            'residence' => '',
        ]);

        DB::transaction(function () use ($request) {
            // check if date of birth is present and proccess the
            // data based on that or base on age
            if ($request['birth_date'] == 'dob') {
                Patient::create([
                    'full_name' => $request['full_name'],
                    'registration_number' => $request['registration_number'],
                    'phone_number' => $request['phone_number'],
                    'gender' => $request['gender'],
                    'birth_date' => $request['dob'],
                    'residence' => $request['residence'],
                ]);
            } else {
                $patient = Patient::create([
                    'full_name' => $request['full_name'],
                    'registration_number' => $request['registration_number'],
                    'phone_number' => $request['phone_number'],
                    'gender' => $request['gender'],
                    'residence' => $request['residence'],
                ]);
                // create a visit data
                VisitInfo::create([
                    'patient_id' => $patient->id,
                    'age' => $request['age'],
                ]);
            }
        });
        return to_route('patients.index')->with('success', 'New patient has been added!');
    }

    // display single record
    public function show(Patient $patient): View
    {
        $this->authorize('view patient');
        return view('pages.patients.show', compact('patient'));
    }

    // show edit view
    public function edit(Patient $patient): View
    {
        $this->authorize('edit patient');
        return view('pages.patients.edit', compact('patient'));
    }

    // update records in the database
    public function update(Request $request, Patient $patient): RedirectResponse
    {
        // validate
        $this->validate($request, [
            'full_name' => ['required', 'min:3'],
            'phone_number' => ['numeric', 'min:10'],
            'gender' => 'required',
            'birth_date' => 'sometimes',
            'residence' => '',
        ]);

        // update resource
        DB::transaction(function () use ($request, $patient) {
            $patient->update([
                'full_name' => $request['full_name'],
                'phone_number' => $request['phone_number'],
                'gender' => $request['gender'],
                'residence' => $request['residence'],
            ]);
            $new_patient = Patient::find($patient)->first();
            if ($patient->birth_date != null) {
                VisitInfo::create([
                    'patient_id' => $new_patient->id,
                    'age' => $request['age'],
                ]);
            } else {
                $new_patient->visit_info->update([
                    'age' => $request['age'],
                ]);
            }
        });


        return to_route('patients.update', $patient);
    }

    // delete record
    public function destroy(Patient $patient): RedirectResponse
    {
        $this->authorize('delete patient');
        $patient->delete();
        return to_route('patients.index');
    }
}
