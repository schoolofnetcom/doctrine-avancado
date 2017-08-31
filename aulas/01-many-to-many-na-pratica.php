<?php

require_once __DIR__ .'/vendor/autoload.php';

require_once __DIR__ .'/src/doctrine.php';

$entityManager = getEntityManager();

/*$category = new \SON\Entity\Category();
$category->setName("categoria");

$post = new \SON\Entity\Post();
$post->setTitle('titulo')
    ->setContent('content');

//$entityManager->persist($post);
//$entityManager->persist($category);

$postCategory= new \SON\Entity\PostCategory();
$postCategory->setPost($post)
    ->setCategory($category)
    ->setExtra("extra");

$entityManager->persist($postCategory);

$entityManager->flush();*/

$category = new \SON\Entity\Category();
$category->setName("categoria");

$entityManager->persist($category);
$entityManager->flush();

$category = $entityManager->getRepository(\SON\Entity\Category::class)->find(1);

$postCategory = new \SON\Entity\PostCategory();
$postCategory->setCategory($category)
    ->setExtra('extra');

$post = new \SON\Entity\Post();
$post->setTitle('titulo')
    ->setContent('content')
    ->addCategory($postCategory);

$entityManager->persist($post);
$entityManager->flush();