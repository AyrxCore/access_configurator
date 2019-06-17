<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\HouseModel;
use App\Entity\HouseSize;
use App\Entity\Options;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     * @param AuthenticationUtils $authenticationUtils
     * @return Response
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/admin", name="admin")
     * @return Response
     */
    public function administration(EntityManagerInterface $em){
    
        $models = $em->getRepository(HouseModel::class)->findAll();
        $sizes = $em->getRepository(HouseSize::class)->findAll();
        $categories = $em->getRepository(Category::class)->findAll();
        $options = $em->getRepository(Options::class)->findAll();
        
        return $this->render('administration.html.twig', [
            'models' => $models,
            'sizes' => $sizes,
            'categories' => $categories,
            'options' => $options
        ]);
    }
}
