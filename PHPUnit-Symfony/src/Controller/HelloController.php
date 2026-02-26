<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController
{
    #[Route("/")]
    public function index(): Response
    {
        return $this->render('hello/index.html.twig');
    }

    #[Route("/hello/{name}", requirements: ['name' => '[a-zA-Z]+'])]
    public function world($name): Response
    {
//        $response = new Response();
//
//        $response->setStatusCode(200);
//        $response->setContent("Hello, $name !");
//        $response->headers->set('Content-type', 'text/plain');
//
//        return $response;

        return $this->json(['hello' => $name]);
    }


}