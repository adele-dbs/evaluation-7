<?php

namespace App\Controller;

use App\Controller\UserController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'homepage')]
    public function login(AuthenticationUtils $authenticationUtils, TokenInterface $token): Response
    {
        if ($this->getUser()) {
            $user = $token->getUser();
 
            if (in_array('ROLE_ADMIN', $user->getRoles())) {
                return $this->redirectToRoute('app_user_new');
            }
    
            if (in_array('ROLE_CONSULTANT', $user->getRoles())) {
                return $this->redirectToRoute('app_user_index');
            }

            if (in_array('ROLE_APPLICANT', $user->getRoles())) {
                return $this->redirectToRoute('app_applicant_interface_index');
            }
            
            if (in_array('ROLE_RECRUITMENT', $user->getRoles())) {
                return $this->redirectToRoute('app_recruitment_interface_index');
            }
            //return $this->redirectToRoute('admin');
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
