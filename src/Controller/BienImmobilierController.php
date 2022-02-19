<?php

namespace App\Controller;

use App\Entity\BienImmobilier;
use App\Form\BienImmobilierType;
use http\Env\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BienImmobilierController extends AbstractController
{
    /**
     * @Route("/bien/immobilier", name="bien_immobilier")
     */
    public function index(): Response
    {
        return $this->render('bien_immobilier/index.html.twig', [
            'controller_name' => 'BienImmobilierController',
        ]);
    }
    /**
     * @Route("/addImmo", name="addImmo")
     */
    public function addImmo(\Symfony\Component\HttpFoundation\Request $request){
        $immo= new BienImmobilier();
        $form=$this->createForm(BienImmobilierType::class,$immo);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $em =$this->getDoctrine()->getManager();
            $immo->setEtat('Disponible');
            $em->persist($immo);
            $em->flush();
            return $this->redirectToRoute('addImmo');
        }
        return $this->render("bien_immobilier/add.html.twig",array('formulaireImmo'=>$form->createView()));
    }
}
