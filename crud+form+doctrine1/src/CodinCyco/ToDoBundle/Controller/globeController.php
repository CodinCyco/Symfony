<?php

namespace CodinCyco\ToDoBundle\Controller;

use CodinCyco\ToDoBundle\Entity\globe;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class globeController extends Controller
{
    public function indexAction()
    {
        $globes = $this->getDoctrine()->getRepository("CodinCycoToDoBundle:globe")->findAll();
        return $this->render('CodinCycoToDoBundle:globe:index.html.twig', array(
            // ...
            'globes'=>$globes
        ));
    }

    public function addAction(Request $request)
 {

        return $this->render('CodinCycoToDoBundle:globe:add.html.twig', array(

        ));
    }

    public function deleteAction()
    {
        return $this->render('CodinCycoToDoBundle:globe:delete.html.twig', array(
            // ...
        ));
    }

    public function updateAction()
    {
        return $this->render('CodinCycoToDoBundle:globe:update.html.twig', array(
            // ...
        ));
    }

    public function detailsAction()
    {
        return $this->render('CodinCycoToDoBundle:globe:details.html.twig', array(
            // ...
        ));
    }

}
