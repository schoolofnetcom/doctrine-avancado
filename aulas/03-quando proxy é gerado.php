<?php

require_once __DIR__ .'/vendor/autoload.php';

require_once __DIR__ .'/src/doctrine.php';

$entityManager = getEntityManager();

$category = new \SON\Entity\Category();
$category->setName("categoria");

$entityManager->persist($category);
$entityManager->flush();

//$category = $entityManager->getRepository(\SON\Entity\Category::class)->find(1);
/** @var \SON\Entity\Category $category */
$category = $entityManager
    ->getReference(\SON\Entity\Category::class,1);

dump($category->getPosts()->first()->getPost()->getTitle());