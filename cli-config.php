<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;

require_once dirname(__FILE__) . '/src/bootstrap.php';

$entityManager = getEntityManager();

return ConsoleRunner::createHelperSet($entityManager);
