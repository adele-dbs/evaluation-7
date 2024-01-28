<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RecruitmentInterfaceController extends AbstractController
{
    #[Route('/recruitment/interface', name: 'app_recruitment_interface')]
    public function index(): Response
    {
        return $this->render('recruitment_interface/index.html.twig', [
            'controller_name' => 'RecruitmentInterfaceController',
        ]);
    }
}
