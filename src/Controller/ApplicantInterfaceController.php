<?php

namespace App\Controller;

use App\Entity\Application;
use App\Form\ApplicationType;
use App\Repository\ApplicationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/applicant/interface')]
class ApplicantInterfaceController extends AbstractController
{
    #[Route('/', name: 'app_applicant_interface_index', methods: ['GET'])]
    public function index(ApplicationRepository $applicationRepository): Response
    {
        return $this->render('applicant_interface/index.html.twig', [
            'applications' => $applicationRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_applicant_interface_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $application = new Application();
        $form = $this->createForm(ApplicationType::class, $application);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($application);
            $entityManager->flush();

            return $this->redirectToRoute('app_applicant_interface_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('applicant_interface/new.html.twig', [
            'application' => $application,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_applicant_interface_show', methods: ['GET'])]
    public function show(Application $application): Response
    {
        return $this->render('applicant_interface/show.html.twig', [
            'application' => $application,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_applicant_interface_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Application $application, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ApplicationType::class, $application);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_applicant_interface_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('applicant_interface/edit.html.twig', [
            'application' => $application,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_applicant_interface_delete', methods: ['POST'])]
    public function delete(Request $request, Application $application, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$application->getId(), $request->request->get('_token'))) {
            $entityManager->remove($application);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_applicant_interface_index', [], Response::HTTP_SEE_OTHER);
    }
}
