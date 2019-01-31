<?php

namespace CodinCyco\ToDoBundle\Controller;

use CodinCyco\ToDoBundle\Entity\todo;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\DateTime;

class ToDoController extends Controller
{
    public function createAction(Request $request)
    {
        $todo = new todo();
        $form = $this->createFormBuilder($todo)
            ->add('name',TextType::class,array('attr'=>array('class'=>'form-control','style'=>'margin-bottom:15px')))
            ->add('category',TextType::class,array('attr'=>array('class'=>'form-control','style'=>'margin-bottom:15px')))
            ->add('globe',EntityType::class,array('attr'=>array('class'=>'form-control','style'=>'margin-bottom:15px'),
                                                            'class'=>'CodinCycoToDoBundle:globe',
                                                            'choice_label'=>'name',
                                                            'multiple'=>false))
            ->add('description',TextareaType::class,array('attr'=>array('class'=>'form-control','style'=>'margin-bottom:15px')))
            ->add('priority',ChoiceType::class,array('choices'=>array('low'=>"Low",'normal'=>'Normal','high'=>'High'),'attr'=>array('class'=>'form-control','style'=>'margin-bottom:15px')))
            ->add('due_date',DateTimeType::class,array('attr'=>array('style'=>'margin-bottom:15px')))
            ->add('save',SubmitType::class,array('label'=>'Save','attr'=>array('class'=>'btn btn-success','style'=>'margin-bottom:15px')))
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $todo->setName($form['name']->getData());
            $todo->setPriority($form['priority']->getData());
            $todo->setDescription($form['description']->getData());
            $todo->setDueDate($form['due_date']->getData());
            $todo->setCategory($form['category']->getData());
            $todo->setCreateDate(new\DateTime('now'));
            $em=$this->getDoctrine()->getManager();
            $em->persist($todo);
            $em->flush();

            $this->addFlash(
              'notice',
              'ToDo added'
            );
            return $this->redirectToRoute('codin_cyco_to_do_homepage');

        }
        return $this->render('CodinCycoToDoBundle:Default:create.html.twig',array('form'=>$form->createView()));
    }

    public function editAction($id,Request $request)
    {
        $todo = $this->getDoctrine()->getRepository('CodinCycoToDoBundle:todo')->find($id);
        $form = $this->createFormBuilder($todo)
            ->add('name',TextType::class,array('attr'=>array('class'=>'form-control','style'=>'margin-bottom:15px')))
            ->add('globe',EntityType::class,array('attr'=>array('class'=>'form-control','style'=>'margin-bottom:15px')
            ,'class'=>'CodinCycoToDoBundle:globe',
                'choice_label'=>'name',
                'multiple'=>false))
            ->add('category',TextType::class,array('attr'=>array('class'=>'form-control','style'=>'margin-bottom:15px')))
            ->add('description',TextareaType::class,array('attr'=>array('class'=>'form-control','style'=>'margin-bottom:15px')))
            ->add('priority',ChoiceType::class,array('choices'=>array('low'=>"Low",'normal'=>'Normal','high'=>'High'),'attr'=>array('class'=>'form-control','style'=>'margin-bottom:15px')))
            ->add('due_date',DateTimeType::class,array('attr'=>array('style'=>'margin-bottom:15px')))
            ->add('save',SubmitType::class,array('label'=>'Save','attr'=>array('class'=>'btn btn-success','style'=>'margin-bottom:15px')))
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $todo->setName($form['name']->getData());
            $todo->setPriority($form['priority']->getData());
            $todo->setDescription($form['description']->getData());
            $todo->setDueDate($form['due_date']->getData());
            $todo->setCategory($form['category']->getData());
            $todo->setCreateDate(new\DateTime('now'));
            $em = $this->getDoctrine()->getManager();
            $todo = $em->getRepository("CodinCycoToDoBundle:todo")->find($id);
            $em->flush();

            $this->addFlash(
                'notice',
                'ToDo updated'
            );
            return $this->redirectToRoute('codin_cyco_to_do_homepage');
        }
        return $this->render('CodinCycoToDoBundle:Default:edit.html.twig',array('form'=>$form->createView()));
    }


    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository("CodinCycoToDoBundle:todo");
        $todo = $repo->find($id);
        $em->remove($todo);
        $em->flush();
        $this->addFlash(
            'notice',
            'ToDo Removed'
        );
        return $this->redirectToRoute('codin_cyco_to_do_homepage');
    }
    public function getAction($id)
    {
        $todo = $this->getDoctrine()->getRepository('CodinCycoToDoBundle:todo')->find($id);

        return $this->render('CodinCycoToDoBundle:Default:details.html.twig',array('todo'=>$todo));
    }
}
