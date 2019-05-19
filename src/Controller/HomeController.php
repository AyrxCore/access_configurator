<?php

namespace App\Controller;

use App\Entity\House\HouseModel;
use App\Entity\House\HouseSize;
use App\Entity\Product\Category;
use App\Entity\Product\Options;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
//use Symfony\Component\HttpFoundation\Request;


class HomeController extends AbstractController
{
    /**
     * @Route ("/", name="home")
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function chooseModel(EntityManagerInterface $em)
    {
        $models = $em->getRepository(HouseModel::class)->findAll();
        
        return $this->render('home.html.twig', array(
            'models' => $models
        ));
    }

    /**
     * @Route ("/{name}", name="size")
     * @param EntityManagerInterface $em
     * @param $name
     * @return Response
     */
    public function chooseSize(EntityManagerInterface $em, $name)
    {
        $model = $em->getRepository(HouseModel::class)->findOneBy(array('name' => $name));
        $sizes = $em->getRepository(HouseSize::class)->findBy(array('name' => $name));

        return $this->render('size.html.twig', array(
            'sizes' => $sizes,
            'model' => $model
        ));
    }

    /**
     * @Route ("/{name}/{surface}", name="config")
     * @param EntityManagerInterface $em
     * @param $name
     * @param $surface
     * @return Response
     */
    public function configHouse(EntityManagerInterface $em, $name, $surface)
    {
        $model = $em->getRepository(HouseModel::class)->findOneBy(array('name' => $name));
        $size = $em->getRepository(HouseSize::class)->findOneBy(array('surface' => $surface));
        $categories = $em->getRepository(Category::class)->findAll();
        $options = $em->getRepository(Options::class)->findAll();

        return $this->render('config.html.twig', array(
            'model' => $model,
            'size' => $size,
            'categories' => $categories,
            'options' => $options
        ));
    }
}