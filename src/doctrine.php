<?php

$paths = [
    __DIR__ . '/Entity'
];

$isDevMode = true;

$cache = new \Doctrine\Common\Cache\ArrayCache();

$dbParams = [
    'driver' => 'pdo_mysql',
    'user' => 'root',
    'password' => 'root',
    'dbname' => 'son_doctrine_avanc_curso'
];

$config = new \Doctrine\ORM\Configuration();
$config->setMetadataCacheImpl($cache);
$driverImpl = $config->newDefaultAnnotationDriver($paths);
$config->setMetadataDriverImpl($driverImpl);
$config->setQueryCacheImpl($cache);
$config->setProxyDir(__DIR__. '/../proxy');
$config->setProxyNamespace('SON\Proxies');
$config->setAutoGenerateProxyClasses(true);

$entityManager = \Doctrine\ORM\EntityManager::create($dbParams,$config);

function getEntityManager(){
    global $entityManager;
    return $entityManager;
}