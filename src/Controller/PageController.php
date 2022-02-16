<?php

namespace App\Controller;
use App\Entity\Manga;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(ManagerRegistry $doctrine): Response
    {
        $repositorio =$doctrine->getRepository(Manga::class);
        $mangas= $repositorio->findAll();
        return $this->render('page/index.html.twig', [
            'mangas' => $mangas
        ]);
    }
}
