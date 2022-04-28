<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PatientController extends Controller
{
    use ApiResponser;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Return the list of patients
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::all();

        return $this->successResponse($patients);
    }

    /**
     * Create one new patient
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'email' => 'required|max:255',
        ];

        $this->validate($request, $rules);

        $patient = Patient::create($request->all());

        return $this->successResponse($patient, Response::HTTP_CREATED);
    }

    /**
     * Obtains and show one patient
     * @return Illuminate\Http\Response
     */
    public function show($patient)
    {
        $patient = Patient::findOrFail($patient);

        return $this->successResponse($patient);
    }

    /**
     * Update an existing patient
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $patient)
    {
        $rules = [
            'name' => 'max:255',
            'surname' => 'max:255|',
            'mail' => 'max:255',
        ];

        $this->validate($request, $rules);

        $patient = Patient::findOrFail($patient);

        $patient->fill($request->all());

        if ($patient->isClean()) {
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $patient->save();

        return $this->successResponse($patient);
    }

    /**
     * Remove an existing patient
     * @return Illuminate\Http\Response
     */
    public function destroy($patient)
    {
        $patient = Patient::findOrFail($patient);

        $patient->delete();

        return $this->successResponse($patient);
    }
}
