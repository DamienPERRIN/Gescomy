<?php

namespace GescomyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="GescomyBundle\Repository\ProductRepository")
 */
class Product
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var Category
     *
     * @ORM\ManyToOne(targetEntity="GescomyBundle\Entity\Category", inversedBy="products", cascade={"persist"})
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity="ProductSupplier", mappedBy="product")
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
     * @return Product
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
     * Set description
     *
     * @param string $description
     *
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set category
     *
     * @param string $category
     *
     * @return Product
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
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
     * @return Product
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

    public function resetProductSupplier(){
        $this->productSupplier = new \Doctrine\Common\Collections\ArrayCollection();
    }
}
