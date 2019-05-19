<?php

namespace App\Controller;

use App\Entity\House\HouseModel;
use App\Entity\House\HouseSize;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
    /**
     * @Route ("/", name="home")
     * @param EntityManagerInterface $em
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
     * @Route ("/{name}", name="size-page")
     * @param EntityManagerInterface $em
     * @param $name
     * @return Response
     */
    public function sizepage(EntityManagerInterface $em, $name)
    {
        $model = $em->getRepository(HouseModel::class)->findOneBy(array('name' => $name));
        $sizes = $em->getRepository(HouseSize::class)->findBy(array('name' => $name));

        return $this->render('size.html.twig', array(
            'sizes' => $sizes,
            'model' => $model
        ));
    }
}