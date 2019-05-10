<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController
{
    /**
     * @Route ("/")
     */
    public function hello()
    {
        echo 'hello';
        return new Response();
    }
}