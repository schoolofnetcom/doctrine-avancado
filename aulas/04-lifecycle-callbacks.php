<?php

require_once __DIR__ .'/vendor/autoload.php';

require_once __DIR__ .'/src/doctrine.php';

$entityManager = getEntityManager();

$category = new \SON\Entity\Category();
$category->setName("categoria");

$entityManager->persist($category);
$entityManager->flush();

sleep(15);

$category->setName("categoria atualizada");
$entityManager->flush();


