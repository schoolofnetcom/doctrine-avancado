<?php

namespace SON\Entity;


/**
 * @Entity
 * @Table(name="post_category")
 */
class PostCategory
{
    /**
     * @var Post
     * @Id
     * @GeneratedValue("NONE")
     * @ManyToOne(targetEntity="SON\Entity\Post", inversedBy="categories", cascade={"persist"})
     */
    private $post;

    /**
     * @var Category
     * @Id
     * @GeneratedValue("NONE")
     * @ManyToOne(targetEntity="SON\Entity\Category", inversedBy="posts", cascade={"persist"})
     */
    private $category;

    /**
     * @Column(type="string")
     */
    private $extra;

    /**
     * @return mixed
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * @param mixed $post
     * @return PostCategory
     */
    public function setPost(Post $post)
    {
        $this->post = $post;
        return $this;
    }

    /**
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param Category $category
     * @return PostCategory
     */
    public function setCategory(Category $category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getExtra()
    {
        return $this->extra;
    }

    /**
     * @param mixed $extra
     * @return PostCategory
     */
    public function setExtra($extra)
    {
        $this->extra = $extra;
        return $this;
    }


}