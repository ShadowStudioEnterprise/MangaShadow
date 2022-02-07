<?php

namespace App\Controller;

use App\Entity\Manga;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
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
    public function upload(ManagerRegistry $doctrine, Request $request): Response
    {
        $manga= new Manga();
        $formulario= $this->createForm(ContactoType::class, $manga);

        $formulario->handleRequest($request);
    
        if ($formulario->isSubmitted() && $formulario->isValid()) {
    
            $manga = $formulario->getData();
    
            $entityManager = $doctrine->getManager();
    
            $entityManager->persist($manga);
    
            $entityManager->flush();
    
            return $this->redirectToRoute('home', ["codigo" => $manga->getId()]);
    
        }
        return $this->render('biblioteca/upload.html.twig', [
            'form' => $formulario->createView()
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
