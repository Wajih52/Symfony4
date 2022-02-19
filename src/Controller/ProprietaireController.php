<?php

namespace App\Controller;

use App\Repository\ProprietaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProprietaireController extends AbstractController
{
    /**
     * @Route("/proprietaire", name="proprietaire")
     */
    public function index(): Response
    {
        return $this->render('proprietaire/index.html.twig', [
            'controller_name' => 'ProprietaireController',
        ]);
    }

    /**
     * @Route("/deletePro/{numProp}", name="deletePro")
     */
    public function delete(ProprietaireRepository $repository,$numProp){
        $proprietaire=$repository->find($numProp);
        $em= $this->getDoctrine()->getManager();
        $em->remove($proprietaire);
        $em->flush();
        return $this->redirectToRoute('addImmo');
    }
}
