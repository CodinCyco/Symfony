<?php

namespace TekUp\GestionLivresBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategorieController extends Controller
{
    public function indexAction()
    {
        return $this->render('TekUpGestionLivresBundle:Default:index.html.twig');
    }

    public function rechercheAction($id){
        $cat = $this->
        getDoctrine()->
        getRepository('TekUpGestionLivresBundle:categorie')
            ->find($id);

        return $this->render("TekUpGestionLivresBundle:Default:index.html.twig",array("cat"=>$cat));
    }

    public function getAllAction(){
        $allCats = $this->
        getDoctrine()->
        getRepository('TekUpGestionLivresBundle:categorie')
        ->findAll();


        return $this->render("TekUpGestionLivresBundle:Default:all.html.twig",array("cats"=>$allCats));
    }
}