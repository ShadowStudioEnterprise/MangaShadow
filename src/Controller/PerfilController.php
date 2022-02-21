<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PerfilController extends AbstractController
{
    /**
     * @Route("/perfil", name="perfil")
     */
    public function index(): Response
    {
        if (!$this->isGranted('ROLE_USER')) {
            throw $this->createAccessDeniedException('No access for you!');
        }
        /** @var \App\Entity\User $user */
        $user = $this->getUser();

        return $this->render('perfil/profile.html.twig', [
            'user' => $user
        ]);
    }
}
