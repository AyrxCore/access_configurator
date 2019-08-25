<?php

namespace App\Controller;

use App\Entity\HouseModel;
use App\Entity\HouseSize;
use App\Entity\Category;
use App\Entity\Product;
use App\Entity\ProductOptions;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
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
     * @Route ("/size", name="size", requirements={"name"="{name}"})
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function chooseSize(Request $request, EntityManagerInterface $em)
    {
        $name = $request->query->get('name');
        $model = $em->getRepository(HouseModel::class)->findOneBy(array('name' => $name));
        $sizes = $em->getRepository(HouseSize::class)->findBy(array('houseModel' => $model));
        return $this->render('size.html.twig', array(
            'sizes' => $sizes,
        ));
    }
    
    /**
     * @Route ("/config", name="config", requirements={"name"="{name}", "surface"="{surface}"})
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function configHouse(Request $request, EntityManagerInterface $em)
    {
        $name = $request->query->get('name');
        $surface = $request->query->get('surface');
        $size = $em->getRepository(HouseSize::class)->findOneBy(array('surface' => $surface));
        $categories = $em->getRepository(Category::class)->findAll();
        // IF nécessaire pour gérer l'exception d'un modèle sans escalier par exemple
        $products = $em->getRepository(Product::class)->findAll();
        $productOptions = $em->getRepository(ProductOptions::class)->findAll();

        return $this->render('config.html.twig', array(
            'name' => $name,
            'size' => $size,
            'categories' => $categories,
            'products' => $products,
            'productOptions' => $productOptions
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
        $categories = $em->getRepository(Category::class)->findAll();

        return $this->render('devis.html.twig', array(
            'size' => $size,
            'name' => $name,
            'categories' => $categories
        ));
    }
}