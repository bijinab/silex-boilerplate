<?php

namespace Api\EmployeesApi;

class Routes extends \Api\Routes
{
    /**
     * Register example endpoints here.
     */
    public function register()
    {

        $this->getApp()->get('/employees', 'Api\EmployeesApi\Controllers\EmployeesController::getAllEmployees');
        $this->getApp()->post('/employee', 'Api\EmployeesApi\Controllers\EmployeesController::newEmployee');
        $this->getApp()->put('/employee/{id}', 'Api\EmployeesApi\Controllers\EmployeesController::updateEmployee');
        $this->getApp()->delete('/employee/{id}', 'Api\EmployeesApi\Controllers\EmployeesController::deleteEmployee');

        $this->getApp()->get('/test/users', function () {
            return 'success';
        });
    }
}