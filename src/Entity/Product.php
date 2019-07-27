<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="product")
     */
    private $category;
    
    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\HouseSize", inversedBy="product")
     */
    private $houseSize;

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param string $category
     * @return Product
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }
    
    /**
     * @return mixed
     */
    public function getHouseSize()
    {
        return $this->houseSize;
    }
    
    /**
     * @param mixed $houseSize
     */
    public function setHouseSize($houseSize)
    {
        $this->houseSize = $houseSize;
    }

}
