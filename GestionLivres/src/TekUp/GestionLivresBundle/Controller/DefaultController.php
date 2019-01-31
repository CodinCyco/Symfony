<?php

namespace TekUp\GestionLivresBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TekUpGestionLivresBundle:Default:index.html.twig');
    }
}
