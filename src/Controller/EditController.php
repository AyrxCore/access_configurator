<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\HouseModel;
use App\Entity\HouseSize;
use App\Entity\Product;
use App\Form\CategoryType;
use App\Form\HouseModelType;
use App\Form\HouseSizeType;
use App\Form\ProductType;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EditController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function administration(EntityManagerInterface $em){

        $models = $em->getRepository(HouseModel::class)->findAll();
        $sizes = $em->getRepository(HouseSize::class)->findAll();
        $categories = $em->getRepository(Category::class)->findAll();
        $options = $em->getRepository(Product::class)->findAll();

        $formModel = $this->createForm(HouseModelType::class);
        $formSize = $this->createForm(HouseSizeType::class);
        $formCategory = $this->createForm(CategoryType::class);
        $formOptions = $this->createForm(ProductType::class);

        return $this->render('admin/administration.html.twig', [
            'models' => $models,
            'sizes' => $sizes,
            'categories' => $categories,
            'options' => $options,
            'formModel' => $formModel->createView(),
            'formSize' => $formSize->createView(),
            'formCategory' => $formCategory->createView(),
            'formOptions' => $formOptions->createView()
        ]);
    }

    /**
     * @Route("/add_element", name="add_element")
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return JsonResponse
     */
    public function addElement(Request $request, EntityManagerInterface $em)
    {
        $post = $request->request;
        $data = [];
        
        foreach ($post as $key => $value){
            $data[$key] = $value;
        }

        if($post->get('type') === 'models'){
            $entity = new HouseModel();
            $entity->setName($post->get('house_model')['name']);
            $entity->setPrice($post->get('house_model')['price']);
            $entity->setDescription($post->get('house_model')['description']);
        }

        if($post->get('type') === 'surfaces'){
            $entity = new HouseSize();
            if(isset($post->get('house_size')['name']))
                $entity->setName($post->get('house_size')['name']);
            else
                $entity->setName($post->get('selectName'));
            $entity->setSurface($post->get('house_size')['surface']);
            $entity->setPrice($post->get('house_size')['price']);
            $entity->setDescription($post->get('house_size')['description']);
        }

        if($post->get('type') === 'categories'){
            $entity = new Category();
            $entity->setName($post->get('category')['name']);
        }

        if($post->get('type') === 'options'){
            $entity = new Product();
            $entity->setName($post->get('options')['name']);
            $categoryId = $em->getRepository(Category::class)->findOneBy(array(
                'name' => $post->get('selectName')
            ));
            $entity->setCategory($categoryId);
            $entity->setPrice($post->get('options')['price']);
        }
        
        $em->persist($entity);
        $em->flush();

        $data['id'] = $entity->getId();
        $data['path'] = '{{path(\'edit_element\')}';

        return new JsonResponse($data);
    }

    /**
     * @Route("/supp_element", name="supp_element")
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return JsonResponse
     */
    public function suppElement(Request $request, EntityManagerInterface $em)
    {
        $post = $request->request;

        if($post->get('type') === 'models'){
            $selectElement = $em->getRepository(HouseModel::class)->find($post->get('id'));
        }

        if($post->get('type') === 'surfaces'){
            $selectElement = $em->getRepository(HouseSize::class)->find($post->get('id'));
        }

        if($post->get('type') === 'categories'){
            $selectElement = $em->getRepository(Category::class)->find($post->get('id'));
        }

        if($post->get('type') === 'options'){
            $selectElement = $em->getRepository(Product::class)->find($post->get('id'));
        }
        
        $em->remove($selectElement);
        $em->flush();

        return new JsonResponse();
    }

    /**
     * @Route("/edit_element", name="edit_element")
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return JsonResponse
     */
    public function editElement(Request $request, EntityManagerInterface $em)
    {
        $post = $request->request;

        if($post->get('name') === 'models'){
            $selectElement = $em->getRepository(HouseModel::class)->find($post->get('pk'));
        }

        if($post->get('name') === 'size'){
            $selectElement = $em->getRepository(HouseSize::class)->find($post->get('pk'));
        }

        if($post->get('name') === 'categories'){
            $selectElement = $em->getRepository(Category::class)->find($post->get('pk'));
        }

        if($post->get('name') === 'options'){
            $selectElement = $em->getRepository(Product::class)->find($post->get('pk'));
        }

        switch ($post->get('type')) {
            case 'name':
                $selectElement->setName($post->get('value'));
                break;
            case 'description':
                $selectElement->setDescription($post->get('value'));
                break;
            case 'price':
                $selectElement->setPrice($post->get('value'));
                break;
            case 'size':
                $selectElement->setSurface($post->get('value'));
                break;
            case 'category':
                $categoryId = $em->getRepository(Category::class)->findOneBy(array(
                    'name' => $post->get('value')
                ));
                $selectElement->setCategory($categoryId);
                break;
        };

        $em->persist($selectElement);
        $em->flush();

        return new JsonResponse();
    }

}
