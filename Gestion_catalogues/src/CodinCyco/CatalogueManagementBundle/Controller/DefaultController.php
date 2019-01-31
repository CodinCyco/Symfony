<?php

namespace CodinCyco\CatalogueManagementBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CodinCycoCatalogueManagementBundle:Default:index.html.twig');
    }

    public function getAllAction(){

    }

    public function addAction(){

    }

    public function updateAction(){

    }

    public function deleteAction($id){

    }
}
