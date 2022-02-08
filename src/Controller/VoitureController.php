<?php

namespace App\Controller;

use App\Entity\Voiture;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VoitureController extends AbstractController
{
    /**
     * @Route("/voiture", name="voiture")
     */
    public function index(): Response
    {
        return $this->render('voiture/index.html.twig', [
            'controller_name' => 'VoitureController',
        ]);
    }
    /**
     * @Route("/listVoiture", name="listVoiture")
     */
    public function listVoiture (){
        $Car=$this->getDoctrine()->getRepository(Voiture::class)->findAll();
        return $this->render('voiture/listVoiture.html.twig',array('tabCar'=>$Car));
    }

    /**
     * @Route("/showVoiture/{id}", name="showVoiture")
     */
    public function showVoiture ($id){
        $Car=$this->getDoctrine()->getRepository(Voiture::class)->find($id);
        return $this->render('voiture/showVoiture.html.twig',array('tabCar'=>$Car));
    }

    /**
     * @Route("/deleteVoiture/{id}", name="deleteVoiture")
     */
    public function deleteVoiture ($id){
        $Car=$this->getDoctrine()->getRepository(Voiture::class)->find($id);
        $em=$this->getDoctrine()->getManager();
        $em->remove($Car);
        $em->flush();
        return $this->redirectToRoute('showVoiture');
    }
    /**
     * @Route("/addVoiture/{id}", name="addVoiture")
     */
    public function addClub (){
        $Car=new Voiture();
        return $this->render('voiture/add.html.twig');

    }
}
