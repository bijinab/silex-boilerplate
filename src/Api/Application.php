<?php

namespace Api;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class Application extends \Silex\Application
{
    /**
     * Overload json routine to check for API models.
     *
     * @param array $data
     * @param int $status
     * @param array $headers
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function json($data = array(), $status = 200, $headers = array())
    {
        if ($data instanceof Model) {
            $data = $data->toArray();
        }

        return parent::json($data, $status, $headers);
    }

    /**
     * Get version from file.
     *
     * @return string
     */
    public function getVersion()
    {
        return trim(file_get_contents($this['api.paths']['root'] . 'VERSION'));
    }

}
