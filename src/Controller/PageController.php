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
        $novedades= array_reverse($mangas);
        $novedades=array_slice($novedades,0,4);
        $populares=$repositorio->findAllByVotes();
        $populares=array_slice($populares,0,4);
        return $this->render('page/index.html.twig', [
            'mangas' => $populares, 'novedades' => $novedades
        ]);
    }
    /**
     * @Route("/about", name="about")
     */
    public function about(): Response
    {
        return $this->render('page/about.html.twig', [
            
        ]);
    }
}
