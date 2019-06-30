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
    public function addElement(Request $request, EntityManagerInterface $em)
    {
        $post = $request->request;

        if($post->get('type') === 'modeles'){
            $model = new HouseModel();
            $model->setName($post->get('name'));
            $model->setPrice($post->get('price'));
            $model->setDescription($post->get('description'));
            $em->persist($model);
            $em->flush();
        }

        if($post->get('type') === 'surfaces'){
            $size = new HouseSize();
            $size->setName($post->get('name'));
            $size->setSurface($post->get('surface'));
            $size->setPrice($post->get('price'));
            $size->setDescription($post->get('description'));
            $em->persist($size);
            $em->flush();
        }

        if($post->get('type') === 'categories'){
            $category = new Category();
            $category->setName($post->get('name'));
            $em->persist($category);
            $em->flush();
        }

        if($post->get('type') === 'options'){
            $option = new Options();
            $option->setName($post->get('name'));
            $option->setPrice($post->get('price'));
            $em->persist($option);
            $em->flush();
        }
        $data = $post;

        dump($data);

        return new JsonResponse($data);
    }

}
