<?php

namespace ABC\RspBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ABC\RspBundle\Entity\Resourceperson;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Collections\ArrayCollection;

class RspCourseManagerController extends Controller
{
    
public function showCoursesAction($id){
    
    // get the resource person
        $em = $this->getDoctrine()->getEntityManager();
        $repo = $em->getRepository('ABCRspBundle:Resourceperson');
        $rsp = $repo->find($id);
   
        if(!$rsp){
                throw $this->createNotFoundException("Unable to find the Resource Person");
        }
            
        $dept = $rsp->getDeptName();
        $courses = $em->getRepository('ABCRspBundle:Course')->findBy(array('deptName' => $dept));

        return $this->render('ABCRspBundle:rsp:rspCourseAdd.html.twig', array('id' => $id, 'courses' => $courses));
    
}

public function assignCoursesAction(Request $request,$id){
        $titles = array();
        $courses= new ArrayCollection();
       
        
       if($request->getMethod()=='GET'){
           
           $total = $request->get('total');
           for($count=0;$count<$total;$count++){
               
               if($request->get("$count") != NULL){
                   $titles[]=$request->get("$count");
               }                           
           }
           
           for($i=0;$i<$total;$i++){
                $em = $this->getDoctrine()->getEntityManager();
               $repo = $em->getRepository('ABCRspBundle:Course');
               $courses = $repo->findOneBy(array('title'=>'$titles[$i]'));
           }
       }
       $size= count($courses);
        $name1 = $courses[0]->getTitle();
        $name2 ="Crazy";
        return $this->render('ABCRspBundle:rsp:test.html.twig',array('size'=>$size,'name1'=>$name1,'name2'=>$name2)); 
}
}
