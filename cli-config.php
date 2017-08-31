<?php

require_once __DIR__ . '/src/doctrine.php';

$entityManager = getEntityManager();

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);