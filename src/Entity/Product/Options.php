<?php

namespace App\Entity\Product;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="options")
 * @ORM\Entity(repositoryClass="App\Repository\OptionsRepository")
 */
class Options
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $category;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $price;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $img;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $color;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $material;
    
    const COLORS = [
        "Blanc",
        "Noir",
        "Gris"
    ];

    const MATERIALS = [
        "Acier",
        "Bois",
        "Béton"
    ];
    
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
     * @return Options
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     * @return Options
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     * @return Options
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }
    
    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
    
    /**
     * @return mixed
     */
    public function getImg()
    {
        return $this->img;
    }
    
    /**
     * @param mixed $img
     * @return Options
     */
    public function setImg($img)
    {
        $this->img = $img;
        return $this;
    }
    
    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }
    
    /**
     * @param mixed $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }
    
    /**
     * @return mixed
     */
    public function getMaterial()
    {
        return $this->material;
    }
    
    /**
     * @param mixed $material
     */
    public function setMaterial($material)
    {
        $this->material = $material;
    }

}
