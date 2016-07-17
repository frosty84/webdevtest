<?php

/**
 * Returns actual config merged with default one
 * @param $env
 * @return array
 */
function load_config()
{
    //config init
    $defaultConfig = [];

    $defaultConfigPath = APP_BASEPATH . '/config/default.php';

    if (is_readable($defaultConfigPath)) {
        require_once $defaultConfigPath;
    }

    return $defaultConfig;
}

/**
 * Load corresponding propel configuration file
 * @param $env
 */
function load_propel_config($env)
{
    //picking up corresponding config file
    switch ($env) {
        case 'dev':
            $configName = 'dev.php';
            break;

        default:
            $configName = 'dev.php';
            break;
    }
    $configPath = APP_BASEPATH . '/config/' . $configName;
    if (is_readable($configPath)) {
        require_once $configPath;
    }
}
