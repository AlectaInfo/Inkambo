<?php

namespace ABC\ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ABC\ApplicationBundle\Entity\Applicant;
use ABC\ApplicationBundle\Form\ApplicantType;
use Symfony\Component\HttpFoundation\Request;

class ApplicantController extends Controller
{
    public function indexAction()
    {
        return $this->render('ABCApplicationBundle:Application:index.html.twig');
    }
    
    // action to render the form for adding a new resource person 
    public function newAction(){
            
        $applicant = new Applicant();
        $form = $this->createAddForm($applicant);

        
        return $this->render('ABCResourcePersonBundle:rsp:add.html.twig',array('applicant'=>$applicant,'form'=> $form->createView()));
    }
}
