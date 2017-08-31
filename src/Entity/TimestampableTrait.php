<?php
/**
 * Created by PhpStorm.
 * User: argen
 * Date: 31/08/2017
 * Time: 08:42
 */

namespace SON\Entity;


trait TimestampableTrait
{
    /**
     * @Column(type="datetime")
     */
    private $createdAt;

    /**
     * @Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * //pre-persist -> antes de inserir a entidade no banco de dados
     * @param mixed $createdAt
     * @PrePersist
     */
    public function setCreatedAt()
    {
        $this->createdAt = new \DateTime();
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param mixed $updatedAt
     * @PrePersist
     * @PreUpdate
     */
    public function setUpdatedAt()
    {
        $this->updatedAt = new \DateTime();
    }
}