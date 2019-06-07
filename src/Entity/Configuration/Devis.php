<?php

namespace App\Entity\Configuration;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="devis")
 * @ORM\Entity()
 */
class Devis
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}