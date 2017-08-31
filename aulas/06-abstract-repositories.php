<?php

require_once __DIR__ .'/vendor/autoload.php';

require_once __DIR__ .'/src/doctrine.php';

$entityManager = getEntityManager();

$category = new \SON\Entity\Category();
$category->setName("categoria");

/** @var \SON\Repository\AbstractRepository $categoryRepository */
$categoryRepository = $entityManager->getRepository(\SON\Entity\Category::class);
$categoryRepository->save($category);

dump($categoryRepository->getReference(1));

$category = $categoryRepository->find(1);
$category->setName("categoria atualizado");
$categoryRepository->save($category);

$category = $categoryRepository->find(1);
dump($category);

$categoryRepository->delete(1);