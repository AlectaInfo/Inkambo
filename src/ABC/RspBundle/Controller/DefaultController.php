<?php

namespace ABC\RspBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ABCRspBundle:Default:home.html.twig');
    }
    
     public function showAction($id){
        
        $em = $this->getDoctrine()->getEntityManager();
        $entity = $em->getRepository('ABCRspBundle:Resourceperson')->find($id);
        
        if(!$entity){
            throw $this->createNotFoundException('Unable to find the Resource Person');
        }
       
        return $this->render('ABCRspBundle:userView:showRsp.html.twig',array(
            'entity'=>$entity,    
                ));
    }
    
    public function showAllAction(){
         $em = $this->getDoctrine()->getManager();
         $entites = $em->getRepository('ABCRspBundle:Resourceperson')->findAll();
         
         if(!$entites){
               throw $this->createNotFoundException("NO entities to be shown");
         }
         
         return $this->render('ABCRspBundle:userView:showRspAll.html.twig',array("entities"=>$entites));
                 
        
    }
}
