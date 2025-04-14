<?php

use Adminer\Plugins;

const APP_VERSION = '2.1.0';

include __DIR__ . '/core/functions.php';
include __DIR__ . '/core/adminer.php';

function adminer_object()
{
    $plugins = [];
    foreach (glob(__DIR__ . '/plugins/*.php') as $path) {
        include_once $path;
        $class = preg_replace('/\.php$/i', '', basename($path));
        $plugins[] = new $class();
    }

    return new class($plugins) extends Plugins
    {
        public function login($login, $password)
        {
            if (env('SQLITE_LOGIN_WITHOUT_PASSWORD', false)) {
                return true;
            }
            return parent::login($login, $password);
        }
    };
}
