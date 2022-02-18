<?php

namespace App\Controller;

use App\Entity\Capitulos;
use App\Entity\Manga;
use App\Form\UploadType;
use App\Form\CapitulosUploadType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class BibliotecaController extends AbstractController
{
    /**
     * @Route("/biblioteca", name="biblioteca")
     */
    public function index(ManagerRegistry $doctrine): Response
    {
        $repositorio =$doctrine->getRepository(Manga::class);
        $mangas= $repositorio->findAll();
        
        return $this->render('biblioteca/biblioteca.html.twig', [
            'mangas' => $mangas
        ]);
    }
    /**
     * @Route("/biblioteca/upload", name="upload_biblioteca")
     */
    public function upload(ManagerRegistry $doctrine, Request $request): Response
    {
        if (!$this->isGranted('ROLE_USER')) {
            throw $this->createAccessDeniedException('No access for you!');
        }

        $manga= new Manga();
        $formulario= $this->createForm(UploadType::class, $manga)
            ->add('submit', SubmitType::class, ['label' => 'Crear Manga']);

        $formulario->handleRequest($request);
    
        if ($formulario->isSubmitted() && $formulario->isValid()) {
    
            $manga = $formulario->getData();
    
            $entityManager = $doctrine->getManager();
    
            $entityManager->persist($manga);
    
            $entityManager->flush();
    
            return $this->redirectToRoute('biblioteca', ["codigo" => $manga->getId()]);
    
        }
        return $this->render('biblioteca/upload.html.twig', [
            'form' => $formulario->createView()
        ]);
    }
    /**
     * @Route("/biblioteca/upload/{id}", name="upload_biblioteca_manga")
     */
    public function uploadM(ManagerRegistry $doctrine, Request $request, $id): Response
    {
        if (!$this->isGranted('ROLE_USER')) {
            throw $this->createAccessDeniedException('No access for you!');
        }
        $capitulos= new Capitulos();
        $formulario= $this->createForm(CapitulosUploadType::class, $capitulos)
            ->add('submit', SubmitType::class, ['label' => 'Subir Capitulo']);

        $formulario->handleRequest($request);
        
        if ($formulario->isSubmitted() && $formulario->isValid()) {
            $capitulos->setFechaSubida(new \DateTime());
            $capitulos = $formulario->getData();
     
            $entityManager = $doctrine->getManager();
    
            $entityManager->persist($capitulos);
    
            $entityManager->flush();
    
            return $this->redirectToRoute('biblioteca', ["nombre" => $capitulos->getId()]);
    
        }
        return $this->render('biblioteca/uploadC.html.twig', [
            'form' => $formulario->createView()
        ]);
    }
    /**
     * @Route("/biblioteca/{titulo}", name="manga_biblioteca")
     */
    public function manga(ManagerRegistry $doctrine,$titulo): Response
    {
        $repositorio =$doctrine->getRepository(Manga::class);
        $manga= $repositorio->find($titulo);
        $capitulos=$manga->getCapitulos();
        return $this->render('biblioteca/manga.html.twig', [
            'manga' => $manga, 'capitulos' =>$capitulos
        ]); 
    }
    /**
     * @Route("/biblioteca/{titulo}/star/{vote}", name="votar_manga_biblioteca")
     */
    public function votar(ManagerRegistry $doctrine,$titulo,$vote): Response
    {
        $repositorio =$doctrine->getRepository(Manga::class);
        $entityManager = $doctrine->getManager();
        $manga= $repositorio->find($titulo);
        if($manga){
            if(is_numeric($vote)){
                if($vote>=0 &&$vote<=5){
                    $manga->setPuntuacion($manga->getPuntuacion()+$vote);
                    $votos=$manga->getVotos()+1;
                    $manga->setVotos($votos);
                    $entityManager->flush();
                    return new Response("Hecho");
                }else
                    return new Response("Error");
            }else{
                return new Response("Error");
            }
        
        }else
            return new Response("Error");
    }
    /**
     * @Route("/biblioteca/{titulo}/{capitulo}", name="capitulo_manga_biblioteca")
     */
    public function capitulo(ManagerRegistry $doctrine,$titulo,$capitulo): Response
    {
        $repositorio =$doctrine->getRepository(Manga::class);
        $manga= $repositorio->find($titulo);
        $capitulos=$manga->getCapitulos();
        $cap =null;
        foreach ($capitulos as $capituloE) {
            if ($capituloE->getId()==$capitulo) {
                $cap=$capituloE;
            }
        }
        $imagenes=json_decode($cap->getImagenes());
        return $this->render('biblioteca/capitulos.html.twig', [
            'capitulo' => $cap, 'imagenes'=> $imagenes
        ]); 
    }
}
