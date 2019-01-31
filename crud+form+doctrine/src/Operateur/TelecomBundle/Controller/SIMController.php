<?php

namespace Operateur\TelecomBundle\Controller;

use Operateur\TelecomBundle\Entity\SIM;
use Operateur\TelecomBundle\Form\SIMType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SIMController extends Controller
{
    public function addSimAction(Request $request)
    {
        $sim = new SIM();
        $form = $this->createForm(SIMType::class,$sim);
        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($sim);
            $em->flush();
            return $this->redirectToRoute('get_all');
        }
        return $this->render('OperateurTelecomBundle:SIM:add_sim.html.twig', array(
            // ...
            'form'=>$form->createView()
        ));

    }


    public function getAllAction(){
       $all = $this->getDoctrine()->getRepository("OperateurTelecomBundle:SIM")->findAll();
       return $this->render('OperateurTelecomBundle:SIM:get_all.html.twig',array('sims'=>$all));
    }

}
