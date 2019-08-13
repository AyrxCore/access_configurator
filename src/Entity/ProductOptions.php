<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="product_options")
// * @ORM\Entity(repositoryClass="App\Repository\ProductOptionsRepository")
 */
class ProductOptions
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Product", inversedBy="productOptions")
     */
    private $product;
    
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
    
    /**
     * @ORM\Column(type="json_array", length=255, nullable=true)
     */
    private $price;
    
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
     * @return ProductOptions
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param string $product
     * @return ProductOptions
     */
    public function setProduct($product)
    {
        $this->product = $product;
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
     * @return ProductOptions
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
    
    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }
    
    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

}
