<?php

namespace ABC\ApplicantBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ABCApplicantBundle:Default:index.html.twig', array('name' => $name));
    }
    
    public function showUserAction(){
        
    }
    
    public function showAllUserAction($id){
        
        $em = $this->getDoctrine()->getEntityManager();
        $entity = $em->getRepository('ABCResourcePersonBundle:Resourceperson')->find($id);
        
        if(!$entity){
            throw $this->createNotFoundException('Unable to find the Resource Person');
        }
        return $this->render('ABCRspBundle:rsp:show.html.twig',array(
            'entity'=>$entity,
          
                ));
    }
}
