<?php

namespace SON\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity(repositoryClass="SON\Repository\CategoryRepository")
 * @HasLifecycleCallbacks
 * @Table(name="categories")
 */
class Category
{
    use TimestampableTrait;

    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @Column(type="string")
     */
    private $name;

    /**
     * @OneToMany(targetEntity="SON\Entity\PostCategory", mappedBy="category",cascade={"persist"})
     */
    private $posts;

    public function __construct()
    {
        $this->posts = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Category
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function addPost(PostCategory $postCategory){
        $this->posts->add($postCategory);
        $postCategory->setCategory($this);
        return $this;
    }

    public function getPosts(){
        return $this->posts;
    }

    /**
     * @ PrePersist
     * public function calculateTotal(){
     *      $somar = 0;
     *      foreach($this->produtos as $produto){
     *          $somar += $produto->getPreco()
     *
     *      }
     *      $this->total = $soma
     * }
     */



}