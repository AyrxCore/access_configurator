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

class HomeController extends AbstractController
{
    /**
     * @Route ("/", name="home")
     * @return Response
     */
    public function chooseModel()
    {
        return $this->render('home.html.twig');
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
        $size = $em->getRepository(HouseSize::class)->findOneBy(array('surface' => $surface));
        $categories = $em->getRepository(Category::class)->findAll();
        $options = $em->getRepository(Options::class)->findAll();

        return $this->render('config.html.twig', array(
            'name' => $name,
            'size' => $size,
            'categories' => $categories,
            'options' => $options
        ));
    }
    
    /**
     * @Route ("/{name}/{surface}/total", name="total")
     * @param EntityManagerInterface $em
     * @param $name
     * @param $surface
     * @return Response
     */
    public function total(EntityManagerInterface $em, $name, $surface)
    {
        $size = $em->getRepository(HouseSize::class)->findOneBy(array('surface' => $surface));

        return $this->render('total.html.twig', array(
            'size' => $size,
            'name' => $name
        ));
    }
}