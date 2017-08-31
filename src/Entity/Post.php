<?php

namespace SON\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/*
 * post_category -> post_id e category_id, outros campos
 * Post <---OneToMany--->  PostCategory  <---OneToMany---> Category
 */
/**
 * @Entity(repositoryClass="SON\Repository\PostRepository")
 * @Table(name="posts")
 */
class Post
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @Column(type="string", length=100)
     */
    private $title;

    /**
     * @Column(type="text")
     */
    private $content;

    /**
     * @OneToMany(targetEntity="SON\Entity\PostCategory", mappedBy="post",cascade={"persist"})
     */
    private $categories;

    /**
     * Post constructor.
     */
    public function __construct()
    {
        $this->categories = new ArrayCollection();
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return Post
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     * @return Post
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    public function addCategory(PostCategory $postCategory){
        $this->categories->add($postCategory);
        $postCategory->setPost($this);
        return $this;
    }

    public function getCategories(){
        return $this->categories;
    }
}