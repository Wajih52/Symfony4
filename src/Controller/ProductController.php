<?php

namespace App\Controller;

use PhpParser\Node\Expr\Array_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="product")
     */
    public function index(): Response
    {
        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }
    /**
     * @Route("/listProduct", name="productList")
     */
    public function listeProduct (){
//        return new Response('Product');
        $var1="2 CINFO 4";
        $var2="Asma Ayari";
        return $this->render('product/list.html.twig',array('class1'=>$var1,'class2'=>$var2));
    }
    /**
     * @Route("/showProduct/{var}", name="productShow")
     */
    public function showProduct ($var){
        return new Response('Product'.$var);
    }
}
