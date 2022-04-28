<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class PatientService
{
    use ConsumesExternalService;

    /**
     * The base uri to consume the patients service
     * @var string
     */
    public $baseUri;

    /**
     * The secret to consume the patients service
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.patients.base_uri');
        $this->secret = config('services.patients.secret');
    }

    /**
     * Obtain the full list of patient from the patient service
     * @return string
     */
    public function obtainPatients()
    {
        return $this->performRequest('GET', '/patients');
    }

    /**
     * Create one patient using the patient service
     * @return string
     */
    public function createPatient($data)
    {
        return $this->performRequest('POST', '/patients', $data);
    }

    /**
     * Obtain one single patient from the patient service
     * @return string
     */
    public function obtainPatient($patient)
    {
        return $this->performRequest('GET', "/patients/{$patient}");
    }

    /**
     * Update an instance of patient using the patient service
     * @return string
     */
    public function editPatient($data, $patient)
    {
        return $this->performRequest('PUT', "/patients/{$patient}", $data);
    }

    /**
     * Remove a single patient using the patient service
     * @return string
     */
    public function deletePatient($patient)
    {
        return $this->performRequest('DELETE', "/patients/{$patient}");
    }
}
