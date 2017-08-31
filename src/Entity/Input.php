<?php

namespace SON\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @HasLifecycleCallbacks
 * @Table
 */
class Input
{
    use TimestampableTrait;

    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @OneToMany(targetEntity="SON\Entity\InputProduct", mappedBy="input",cascade={"persist"})
     */
    private $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    public function addProduct(InputProduct $product){
        $this->products->add($product);
        $product->setInput($this);
        return $this;
    }

    public function getProducts(){
        return $this->products;
    }



}