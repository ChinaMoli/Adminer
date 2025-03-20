<?php

include __DIR__ . '/../core/functions.php';
include __DIR__ . '/../core/adminer.php';

function adminer_object()
{
    include __DIR__ . '/../core/plugin.php';

    $plugins = [];
    foreach (glob(__DIR__ . '/../plugins/*.php') as $path) {
        include_once $path;
        $class = preg_replace('/\.php$/i', '', basename($path));
        $plugins[] = new $class();
    }

    return new class($plugins) extends \AdminerPlugin
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
