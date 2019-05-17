<?php

namespace App\Controller;

use App\Entity\House\HouseModel;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
    /**
     * @Route ("/", name="home")
     * @param EntityManager $em
     * @return Response
     */
    public function homepage(EntityManagerInterface $em)
    {
        $models = $em->getRepository(HouseModel::class)->findAll();
        
        return $this->render('home.html.twig', array(
            'models' => $models
        ));
    }
    
    /**
     * @Route ("/{id}/{name}-model", name="size-page")
     * @param EntityManagerInterface $em
     * @param $name
     * @return Response
     */
    public function sizepage(EntityManagerInterface $em, $name, $id)
    {
        
        $size = $em->getRepository(HouseModel::class)->find($id);

        return $this->render('size.html.twig', array(
            'size' => $size
        ));
    }
}