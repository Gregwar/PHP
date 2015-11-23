<?php

function secure($closure) {
    return function(Silex\Application $app) use ($closure) {
        if ($app['session']->has('admin')) {
            return call_user_func_array($closure, func_get_args());
        } else {
            return $app['twig']->render('shouldBeAdmin.html.twig');
        }
    };
};
