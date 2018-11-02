<?php

namespace PHPChallenge\Domain\Entities;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * * Class Person
 *
 * @ORM\Entity(repositoryClass="\PHPChallenge\Infrastructure\Repositories\PersonRepository")
 * @ORM\Table(name="person")
 */
class Person
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @ORM\Column(type="integer")
     */
    public $personid;

    /**
     * @ORM\Column(type="string", length=255)
     */
    public $personname;

    /**
     * @ORM\Column(type="datetime")
     */
    public $created;

    /**
     * @ORM\Column(type="datetime")
     */
    public $updated;

    /**
     * @ORM\OneToMany(targetEntity="PersonPhone", mappedBy="person")
     */
    public $phones;

    /**
     * @ORM\OneToMany(targetEntity="ShipOrder", mappedBy="orderperson")
     */
    public $orders;

    public function __construct()
    {
        $this->phones = new ArrayCollection();
    }

    /**
     * Get the value of personname
     *
     * @return  string
     */
    public function getPersonname()
    {
        return $this->personname;
    }

    /**
     * Set the value of personname
     *
     * @param  string  $personname
     *
     * @return  self
     */
    public function setPersonname(string $personname)
    {
        $this->personname = $personname;

        return $this;
    }

    /**
     * Get the value of phones
     *
     * @return  \Doctrine\Common\Collections\Collection
     */
    public function getPhones()
    {
        return $this->phones;
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
     * Get the value of personid
     */
    public function getPersonid()
    {
        return $this->personid;
    }

    /**
     * Set the value of personid
     *
     * @return  self
     */
    public function setPersonid($personid)
    {
        $this->personid = $personid;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
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
}
