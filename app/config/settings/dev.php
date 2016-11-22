<?php

/**
 * Dev configuration settings.
 */

return array(
    'api.routes' => array(
        'Api\EmployeesApi\Routes'
    ),
    'api.publicUrls' => array('^/$', '^/alive', '^/li$', '^/lo$', '^/logout$', '^/err/', '^/test')
);
