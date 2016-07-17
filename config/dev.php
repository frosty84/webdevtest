<?php
/**
 * Created by PhpStorm.
 * Propel configuration
 * User: frosty84
 * Date: 08.07.2016
 * Time: 13:31
 */

$serviceContainer = \Propel\Runtime\Propel::getServiceContainer();
$serviceContainer->checkVersion('2.0.0-dev');
$serviceContainer->setAdapterClass('hellofresh', 'mysql');
$manager = new \Propel\Runtime\Connection\ConnectionManagerSingle();
$manager->setConfiguration(array(
    'dsn' => 'mysql:host=localhost;dbname=hellofresh',
    'user' => 'hellofresh',
    'password' => 'hellofresh',
    'settings' =>
        array(
            'charset' => 'utf8',
            'queries' =>
                array(),
        ),
    'classname' => '\\Propel\\Runtime\\Connection\\ConnectionWrapper',
));
$manager->setName('hellofresh');
$serviceContainer->setConnectionManager('hellofresh', $manager);
$serviceContainer->setDefaultDatasource('hellofresh');