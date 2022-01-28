<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BibliotecaController extends AbstractController
{
    /**
     * @Route("/biblioteca", name="biblioteca")
     */
    public function index(): Response
    {
        return $this->render('biblioteca/biblioteca.html.twig', [
            'controller_name' => 'BibliotecaController',
        ]);
    }
    /**
     * @Route("/biblioteca/upload", name="upload_biblioteca")
     */
    public function upload(): Response
    {
        return $this->render('biblioteca/biblioteca.html.twig', [
            'controller_name' => 'BibliotecaController',
        ]);
    }
    /**
     * @Route("/biblioteca/upload/{nombre}", name="upload_biblioteca")
     */
    public function uploadM($nombre): Response
    {
        return $this->render('biblioteca/biblioteca.html.twig', [
            'controller_name' => 'BibliotecaController',
        ]);
    }
    /**
     * @Route("/biblioteca/{nombre}", name="manga_biblioteca")
     */
    public function manga($nombre): Response
    {
        return $this->render('biblioteca/biblioteca.html.twig', [
            'controller_name' => 'BibliotecaController',
        ]);
    }
}
