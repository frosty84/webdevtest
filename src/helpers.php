<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

/**
 * Load corresponding configuration file
 * @param $env
 * @return array
 */
function load_db_config($env)
{
    $dbParams = [];
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
        include $configPath;
    }
    else {
        throw new Exception("Configuration is not readable!");
    }
    return $dbParams;
}

function getEntityManager() {

    $paths = array(APP_BASEPATH . '/db');
    $isDevMode = true;

    $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);

    $dbParams = load_db_config(getenv('ENVIRONMENT'));

    $entityManager = EntityManager::create($dbParams, $config);

    return $entityManager;
}
