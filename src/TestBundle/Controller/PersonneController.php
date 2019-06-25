<?php


namespace TestBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use TestBundle\Entity\Personne;
use TestBundle\Form\PersonneType;

class PersonneController extends Controller
{
    public function ajoutAction(Request $request){

        $personne=new Personne();
        $form=$this->createForm(PersonneType::class,$personne);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($personne);
            $em->flush();

        }
        return $this->render('@Test/Personne/ajout.html.twig',array('form'=>$form->createView()));


    }

}