<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class EditController extends AbstractController
{
    /**
     * @Route("/editelements", name="edit_elements")
     * @return JsonResponse
     */
    public function editElements()
    {
        $test = 'hello';
        
        return new JsonResponse($test);
    }
    
}
