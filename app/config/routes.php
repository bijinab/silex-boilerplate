<?php

/**
 * Register default routes and dynamically register routes.
 *
 * Convention:  /:api/:controller
 *
 * @todo flag to scope and register all to allow forwarding?
 */

if (!empty($app['api.routes']) || !is_array($app['api.routes'])) {
    // register routes
    foreach ($app['api.routes'] as $route) {
        $r = new $route($app);
        $r->register();
    }
}