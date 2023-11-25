<?php
namespace App\Controller;

//pour utiliser les annotations :
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
//pour Twig : pour pouvoir utiliser render : 
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
 

class Controller extends AbstractController
{
  #[Route('/')]
  public function number() : Response
  {
	$number = rand(0, 100);
	return $this->render('base.html.twig', [
    	  	'number' => $number,
	]);
  }

  #[Route("/users", name:"user_list", methods:['GET'])]
  public function listUsers( UserRepository $userRepo)
  {
    // …
  }
}