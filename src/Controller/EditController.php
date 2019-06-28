<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\HouseModel;
use App\Entity\HouseSize;
use App\Entity\Options;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class EditController extends AbstractController
{
    /**
     * @Route("/add_element", name="add_element")
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return JsonResponse
     */
    public function addElement(EntityManagerInterface $em)
    {
        if($this->post('type') === 'modeles'){
            $model = new HouseModel();
            $model->setName($this->post('name'));
            $model->setPrice($this->post('price'));
            $model->setDescription($this->post('description'));
            $em->persist($model);
            $em->flush();
        }

        if($this->post('type') === 'surfaces'){
            $size = new HouseSize();
            $size->setName($this->post('name'));
            $size->setSurface($this->post('surface'));
            $size->setPrice($this->post('price'));
            $size->setDescription($this->post('description'));
            $em->persist($size);
            $em->flush();
        }

        if($this->post('type') === 'categories'){
            $category = new Category();
            $category->setName($this->post('name'));
            $em->persist($category);
            $em->flush();
        }

        if($this->post('type') === 'options'){
            $option = new Options();
            $option->setName($this->post('name'));
            $option->setPrice($this->post('price'));
            $em->persist($option);
            $em->flush();
        }
        
        return new JsonResponse();
    }

    public function post($param)
    {
        $request = new Request();
        return $request->request->get($param);
    }
    
}
