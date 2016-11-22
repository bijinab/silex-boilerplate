<?php

/**
 * API Application bootstrap process.
 */

$GLOBALS['startTime'] = microtime(true);

require __DIR__ . '/../vendor/autoload.php';

$app = new Api\Application(array(
    'api.environment' => getenv('APP_ENV') ?: 'dev',
    'debug' => getenv('APP_DEBUG') === '1' ? true : false,
));

// register services
require __DIR__ . '/config/services.php';

// // custom default errors
// require __DIR__ . '/config/errors.php';

// register routes
require __DIR__ . '/config/routes.php';

// middleware hooks
// @see http://silex.sensiolabs.org/doc/middlewares.html
require __DIR__ . '/config/middleware/after.php';

return $app;
