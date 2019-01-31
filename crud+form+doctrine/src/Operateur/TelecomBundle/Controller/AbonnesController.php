<?php

namespace Operateur\TelecomBundle\Controller;

use Operateur\TelecomBundle\Entity\Abonnes;
use Operateur\TelecomBundle\Form\AbonnesType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AbonnesController extends Controller
{

    public function getAllAction()
    {
        $abonnes = $this->getDoctrine()->getRepository("OperateurTelecomBundle:Abonnes")->findAll();
        return $this->render('OperateurTelecomBundle:Abonnes:get_all.html.twig', array(
            // ...
            'abonnes'=>$abonnes
        ));
    }

    public function getAction($id)
    {
        $abonne = $this->getDoctrine()->getRepository("OperateurTelecomBundle:Abonnes")->find($id);
        return $this->render('OperateurTelecomBundle:Abonnes:get.html.twig', array(
            // ...
            'abonne'=>$abonne
        ));
    }



    public function addAction(Request $request)
    {
        $abonne = new Abonnes();
        $form = $this->createForm(AbonnesType::class,$abonne);
        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($abonne);
            $em->flush();
            return $this->redirectToRoute('get_all');
        }
        return $this->render('OperateurTelecomBundle:Abonnes:add.html.twig', array(
            // ...
            'form'=>$form->createView()
        ));
    }

  

}
