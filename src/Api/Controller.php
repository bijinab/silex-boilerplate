<?php

namespace Api;

use Symfony\Component\HttpFoundation\Request;

abstract class Controller
{

    /**
     * Parses JSON data from a request body
     *
     * @param Request $request
     *
     * @return array
     */
    protected function getJSONRequestData(Request $request)
    {
        // if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
            $data = json_decode($request->getContent(), true);
            if (is_array($data)) {
                return $data;
            }
        // }

        return array('pos'=>$request->headers->get('Content-Type'));
    }

}
