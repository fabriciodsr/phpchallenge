<?php

namespace PHPChallenge\Domain\Entities;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * * Class ShipOrder
 *
 * @ORM\Entity(repositoryClass="\PHPChallenge\Infrastructure\Repositories\ShipOrderRepository")
 * @ORM\Table(name="shiporder")
 */
class ShipOrder
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @ORM\Column(type="integer", length=11)
     */
    public $orderid;

    /**
     * @ORM\Column(type="datetime")
     */
    public $created;

    /**
     * @ORM\Column(type="datetime")
     */
    public $updated;

    /**
     * @ORM\OneToMany(targetEntity="ShipOrderItem", mappedBy="shiporder")
     */
    public $items;

    /**
     * @ORM\OneToMany(targetEntity="ShipOrderShipTo", mappedBy="shiporder")
     */
    public $shipto;

    /**
     * @ORM\ManyToOne(targetEntity="Person", inversedBy="orders", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true, onDelete="CASCADE")
     */
    public $orderperson;

    public function __construct()
    {
        $this->items = new ArrayCollection();
        $this->shipto = new ArrayCollection();
    }

    /**
     * Get the value of created
     *
     * @return  \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set the value of created
     *
     * @param  \DateTime  $created
     *
     * @return  self
     */
    public function setCreated(\DateTime $created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get the value of updated
     *
     * @return  \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set the value of updated
     *
     * @param  \DateTime  $updated
     *
     * @return  self
     */
    public function setUpdated(\DateTime $updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get the value of items
     *
     * @return  \Doctrine\Common\Collections\Collection
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Set the value of items
     *
     * @param  \Doctrine\Common\Collections\Collection  $items
     *
     * @return  self
     */
    public function setItems(\Doctrine\Common\Collections\Collection $items)
    {
        $this->items = $items;

        return $this;
    }

    /**
     * Get the value of shipto
     *
     * @return  \Doctrine\Common\Collections\Collection
     */
    public function getShipto()
    {
        return $this->shipto;
    }

    /**
     * Set the value of shipto
     *
     * @param  \Doctrine\Common\Collections\Collection  $shipto
     *
     * @return  self
     */
    public function setShipto(\Doctrine\Common\Collections\Collection $shipto)
    {
        $this->shipto = $shipto;

        return $this;
    }

    /**
     * Get the value of orderperson
     *
     * @return  \PHPChallenge\Entities\Person
     */
    public function getOrderperson()
    {
        return $this->orderperson;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set the value of orderperson
     *
     * @return  self
     */
    public function setOrderperson($orderperson)
    {
        $this->orderperson = $orderperson;

        return $this;
    }

    /**
     * Get the value of orderid
     */
    public function getOrderid()
    {
        return $this->orderid;
    }

    /**
     * Set the value of orderid
     *
     * @return  self
     */
    public function setOrderid($orderid)
    {
        $this->orderid = $orderid;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

}
