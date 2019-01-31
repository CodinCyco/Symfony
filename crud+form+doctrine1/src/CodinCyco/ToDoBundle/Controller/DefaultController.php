<?php

namespace CodinCyco\ToDoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $all = $this->getDoctrine()->getRepository('CodinCycoToDoBundle:todo')->findAll();
        return $this->render('CodinCycoToDoBundle:Default:index.html.twig',array('todos'=>$all));
    }
}
