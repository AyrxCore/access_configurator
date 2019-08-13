<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="house_model")
 * @ORM\Entity(repositoryClass="App\Repository\HouseModelRepository")
 */
class HouseModel
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
     * @ORM\Column(type="integer", nullable=true)
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $img;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;
    
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\HouseSize", mappedBy="houseModel")
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
     * @return HouseModel
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * @return HouseModel
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
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
     * @return HouseModel
     */
    public function setImg($img)
    {
        $this->img = $img;
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
     * @return HouseModel
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
