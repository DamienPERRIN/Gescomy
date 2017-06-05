<?php

namespace GescomyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Supplier
 *
 * @ORM\Table(name="supplier")
 * @ORM\Entity(repositoryClass="GescomyBundle\Repository\SupplierRepository")
 */
class Supplier
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="adress", type="string", length=100)
     */
    private $adress;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100)
     * @Assert\Email()
     */
    private $email;

    /**
     * @var int
     *
     * @ORM\Column(name="postCode", type="integer", length=5)
     * @Assert\Regex("/[0-9]{5}/")
     */
    private $postCode;

    /**
     * @var string
     *
     * @ORM\Column(name="town", type="string", length=50)
     * @Assert\Regex("/[A-Za-z \-']+/")
     */
    private $town;

    /**
     * @var string
     *
     * @ORM\Column(name="siret", type="string", length=20)
     * @Assert\Regex("/[0-9]{3}[ \.\-]?[0-9]{3}[ \.\-]?[0-9]{3}[ \.\-]?[0-9]{5}/")
     */
    private $siret;

    /**
     * @var string
     *
     * @ORM\Column(name="webSite", type="string", length=255)
     * @Assert\Url()
     */
    private $webSite;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="deliveryTime", type="integer")
     * @Assert\Regex("/^[0-3]?[0-9]/")
     */
    private $deliveryTime;

    /**
     * @var int
     *
     * @ORM\Column(name="score", type="integer")
     * @Assert\Regex("/^[1-5]/")
     */
    private $score;

    /**
     * @ORM\OneToMany(targetEntity="ProductSupplier", mappedBy="supplier")
     */
    private $productSupplier;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Supplier
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set adress
     *
     * @param string $adress
     *
     * @return Supplier
     */
    public function setAdress($adress)
    {
        $this->adress = $adress;

        return $this;
    }

    /**
     * Get adress
     *
     * @return string
     */
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Supplier
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set postCode
     *
     * @param integer $postCode
     *
     * @return Supplier
     */
    public function setPostCode($postCode)
    {
        $this->postCode = $postCode;

        return $this;
    }

    /**
     * Get postCode
     *
     * @return int
     */
    public function getPostCode()
    {
        return $this->postCode;
    }

    /**
     * Set town
     *
     * @param string $town
     *
     * @return Supplier
     */
    public function setTown($town)
    {
        $this->town = $town;

        return $this;
    }

    /**
     * Get town
     *
     * @return string
     */
    public function getTown()
    {
        return $this->town;
    }

    /**
     * Set siret
     *
     * @param string $siret
     *
     * @return Supplier
     */
    public function setSiret($siret)
    {
        $this->siret = $siret;

        return $this;
    }

    /**
     * Get siret
     *
     * @return string
     */
    public function getSiret()
    {
        return $this->siret;
    }

    /**
     * Set webSite
     *
     * @param string $webSite
     *
     * @return Supplier
     */
    public function setWebSite($webSite)
    {
        $this->webSite = $webSite;

        return $this;
    }

    /**
     * Get webSite
     *
     * @return string
     */
    public function getWebSite()
    {
        return $this->webSite;
    }

    /**
     * Set deliveryTime
     *
     * @param \DateTime $deliveryTime
     *
     * @return Supplier
     */
    public function setDeliveryTime($deliveryTime)
    {
        $this->deliveryTime = $deliveryTime;

        return $this;
    }

    /**
     * Get deliveryTime
     *
     * @return \DateTime
     */
    public function getDeliveryTime()
    {
        return $this->deliveryTime;
    }

    /**
     * Set score
     *
     * @param integer $score
     *
     * @return Supplier
     */
    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }

    /**
     * Get score
     *
     * @return int
     */
    public function getScore()
    {
        return $this->score;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->productSupplier = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add productSupplier
     *
     * @param \GescomyBundle\Entity\ProductSupplier $productSupplier
     *
     * @return Supplier
     */
    public function addProductSupplier(\GescomyBundle\Entity\ProductSupplier $productSupplier)
    {
        $this->productSupplier[] = $productSupplier;

        return $this;
    }

    /**
     * Remove productSupplier
     *
     * @param \GescomyBundle\Entity\ProductSupplier $productSupplier
     */
    public function removeProductSupplier(\GescomyBundle\Entity\ProductSupplier $productSupplier)
    {
        $this->productSupplier->removeElement($productSupplier);
    }

    /**
     * Get productSupplier
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProductSupplier()
    {
        return $this->productSupplier;
    }
}
