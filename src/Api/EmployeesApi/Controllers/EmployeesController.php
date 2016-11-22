<?php

namespace Api\EmployeesApi\Controllers;

use Api\Application;
use Api\Response;
use Symfony\Component\HttpFoundation\Request;

class EmployeesController extends BaseController {

    /**
     * @param Application $app
     * @param Request     $req
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function getAllEmployees(Application $app, Request $req, $id=2)
    {
        $employees = $app['db']->fetchAll('SELECT * FROM employees');

        return $app->json($employees);
    }

    /**
     * @param Application $app
     * @param Request     $req
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function newEmployee(Application $app, Request $req)
    {
        // Get the POSTed data from the request
        $jsonData = $this->getJSONRequestData($req);
        if (empty($jsonData['firstName'])) {
            $app->abort(400, 'Missing parameters.');
        }
        
        $app['db']->insert('employees', $jsonData);

        return $app->json(array('success'=> true));
    }

    /**
     * @param Application $app
     * @param Request     $req
     * @param string     $id
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function updateEmployee(Application $app, Request $req, $id)
    {
        $jsonData = $this->getJSONRequestData($req);
        $jsonData['id'] = $id;

        $result = $app['db']->update('employees', $jsonData, array('id' => $id));

        if ($result == 1) {
            $response = 'Successfully updated the employee';
        }
        else {
            $response = 'Nothing to update';
        }

        // $employee = $app['db']->fetchAll("SELECT * FROM employees WHERE id = $id");
        
        return $app->json($response);
    }

    /**
     * @param Application $app
     * @param Request     $req
     * @param string     $id
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function deleteEmployee(Application $app, Request $req, $id)
    {
        $jsonData = $this->getJSONRequestData($req);
        $jsonData['id'] = $id;
        return $app->json($jsonData);
        $result = $app['db']->delete('employees', array('id' => $id));

        if ($result == 1) {
            $response = 'Successfully deleted the employee';
        }
        else {
            $response = 'Employee Not found';
        }

        // $employee = $app['db']->fetchAll("SELECT * FROM employees WHERE id = $id");
        
        return $app->json($response);
    }
}