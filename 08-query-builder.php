<?php

require_once __DIR__ . '/vendor/autoload.php';

require_once __DIR__ . '/src/doctrine.php';

$entityManager = getEntityManager();

$post1 = new \SON\Entity\Post();
$post1
    ->setTitle('titulo 1')
    ->setContent('content 1');
$post2 = new \SON\Entity\Post();
$post2
    ->setTitle('titulo 2')
    ->setContent('content 2');


/** @var \SON\Repository\PostRepository $postRepository */
$postRepository = $entityManager->getRepository(\SON\Entity\Post::class);
$postRepository->save($post1);
$postRepository->save($post2);

$category1 = new \SON\Entity\Category();
$category1->setName("categoria");
$category1->addPost((new \SON\Entity\PostCategory())->setExtra('extra')->setPost($post1));

$category2 = new \SON\Entity\Category();
$category2->setName("categoria");
$category2->addPost((new \SON\Entity\PostCategory())->setExtra('extra')->setPost($post2));

/** @var \SON\Repository\AbstractRepository $categoryRepository */
$categoryRepository = $entityManager->getRepository(\SON\Entity\Category::class);
$categoryRepository->save($category1);
$categoryRepository->save($category2);

//SQL -> DQL - Doctrine Query Language

/*$query = $entityManager
    ->createQuery("SELECT p FROM SON\Entity\Post p WHERE p.id LIKE '%1'");
dump($query->getSQL());*/

/*$query = $entityManager
    ->createQuery("SELECT p FROM SON\Entity\Post p WHERE p.id LIKE :id")
    ->setParameter('id','%1');
dump($query->getSQL());*/

$qb = $entityManager->createQueryBuilder();
$results = $qb->select('p')
    ->from(\SON\Entity\Post::class,'p')
    ->leftJoin('p.categories','pc')
    ->leftJoin('pc.category','c')
    ->andWhere("p.id LIKE :id")
    ->orWhere('c.id LIKE :category')
    ->setParameter('id','%1')
    ->setParameter('category','%1')
    ->getQuery()
    //->getArrayResult();
    ->getResult();
dump($results);