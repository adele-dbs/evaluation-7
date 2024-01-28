<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JobAdvertListController extends AbstractController
{
    #[Route('/job/advert/list', name: 'app_job_advert_list')]
    public function index(): Response
    {
        return $this->render('job_advert_list/index.html.twig', [
            'controller_name' => 'JobAdvertListController',
        ]);
    }
}
