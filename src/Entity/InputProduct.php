<?php

namespace SON\Entity;

/**
 * @Entity
 * @HasLifecycleCallbacks
 * @Table(name="input_products")
 */
class InputProduct
{
    use TimestampableTrait;

    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ManyToOne(targetEntity="SON\Entity\Product", cascade={"persist"})
     * @JoinColumn(name="product_id",referencedColumnName="id", nullable=false)
     */
    private $product;

    /**
     * @ManyToOne(targetEntity="SON\Entity\Input", inversedBy="products")
     */
    private $input;

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
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param mixed $product
     */
    public function setProduct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * @return mixed
     */
    public function getInput()
    {
        return $this->input;
    }

    /**
     * @param mixed $input
     */
    public function setInput(Input $input)
    {
        $this->input = $input;
    }





}