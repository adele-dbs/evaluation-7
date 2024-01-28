<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConsultantInterfaceController extends AbstractController
{
    #[Route('/consultant/interface', name: 'app_consultant_interface')]
    public function index(): Response
    {
        return $this->render('consultant_interface/index.html.twig', [
            'controller_name' => 'ConsultantInterfaceController',
        ]);
    }
}
