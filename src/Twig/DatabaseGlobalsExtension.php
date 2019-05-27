<?php

namespace App\Twig;

use App\Entity\House\HouseModel;
use Doctrine\ORM\EntityManagerInterface;
use Twig_Extension;
use Twig_Extension_GlobalsInterface;

/**
 * @property EntityManagerInterface em
 */
class DatabaseGlobalsExtension extends Twig_Extension implements Twig_Extension_GlobalsInterface
{
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }
    
    public function getGlobals()
    {
        return [
            'models' => $this->em->getRepository(HouseModel::class)->findAll(),
        ];
    }
}