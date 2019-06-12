<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="house_size")
 * @ORM\Entity(repositoryClass="App\Repository\HouseSizeRepository")
 */
class HouseSize
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
    private $imgRdc;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imgFloor;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $surface;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

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
     * @return HouseSize
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
     * @return HouseSize
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImgRdc()
    {
        return $this->imgRdc;
    }

    /**
     * @param mixed $imgRdc
     * @return HouseSize
     */
    public function setImgRdc($imgRdc)
    {
        $this->imgRdc = $imgRdc;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImgFloor()
    {
        return $this->imgFloor;
    }

    /**
     * @param mixed $imgFloor
     * @return HouseSize
     */
    public function setImgFloor($imgFloor)
    {
        $this->imgFloor = $imgFloor;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSurface()
    {
        return $this->surface;
    }

    /**
     * @param mixed $surface
     * @return HouseSize
     */
    public function setSurface($surface)
    {
        $this->surface = $surface;
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
     * @return HouseSize
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }
}
