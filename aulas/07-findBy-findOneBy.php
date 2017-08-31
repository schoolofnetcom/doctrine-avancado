<?php

require_once __DIR__ . '/vendor/autoload.php';

require_once __DIR__ . '/src/doctrine.php';

$entityManager = getEntityManager();

$post1 = new \SON\Entity\Post();
$post1->setTitle('titulo 1')
    ->setContent('content 1');

$post2 = new \SON\Entity\Post();
$post2->setTitle('titulo 2')
    ->setContent('content 2');


/** @var \SON\Repository\PostRepository $postRepository */
$postRepository = $entityManager->getRepository(\SON\Entity\Post::class);
$postRepository->save($post1);
$postRepository->save($post2);

//dump($postRepository->findBy(['title' => 'titulo 1','content' => 'content 1']));
/*dump($postRepository->findBy(
    [
        'title' => 'titulo 1'
    ],
    [
        'id' => 'desc'
    ],5,5)
);*/
//dump($postRepository->findById(1));
//dump($postRepository->findOneBy(['title' => 'titulo 1'],['id' => 'desc']));
dump($postRepository->findOneByTitle('titulo 1',['id' => 'desc']));