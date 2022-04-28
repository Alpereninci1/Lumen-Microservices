<?php

namespace App\Http\Controllers;

use App\Patient;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\PatientService;


class PatientController extends Controller
{

    use ApiResponser;

    public $patientService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PatientService $patientService)
    {
        $this->patientService= $patientService;
    }

    /**
     * return the list of patients
     * @return Illumunate\Http\Response
     */

    public function index(){
        return $this->successResponse($this->patientService->obtainPatients());
    }

    /**
     * create a new patients
     * @return Illumunate\Http\Response
     */

    public function store(Request $request){
        return $this->successResponse($this->patientService->createPatient($request->all(),Response::HTTP_CREATED));
    }

    /**
     * Obatains and show one patient
     * @return Illumunate\Http\Response
     */

    public function show($patient){
        return $this->successResponse($this->patientService->obtainPatient($patient));
    }

    /**
     * update an existing patient
     * @return Illumunate\Http\Response
     */

    public function update(Request $request,$patient){
        return $this->successResponse($this->patientService->editPatient($request->all(), $patient));
    }

    /**
     * remove an existing patient
     * @return Illumunate\Http\Response
     */

    public function destroy($patient){
        return $this->successResponse($this->patientService->deletePatient($patient));
    }
}
