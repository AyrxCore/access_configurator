<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\House\HouseModel;


class HomeController extends AbstractController
{
    /**
     * @Route ("/", name="home")
     */
    public function homepage()
    {
        $render = new HouseModel();
        
        dump($render->findAllQuery());
        
        return $this->render('home.html.twig');
    }
}