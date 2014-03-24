<?php

namespace ABC\Admin\ResourceAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use ABC\Admin\ResourceAdminBundle\Entity\Course;

class RspCourseAssignController extends Controller
{
    
    public function showCoursesAction($id){
    
    // get the resource person
        $em = $this->getDoctrine()->getEntityManager();
        $repo = $em->getRepository('ABCAdminResourceAdminBundle:Resourceperson');
        $rsp = $repo->find($id);
   
        if(!$rsp){
                throw $this->createNotFoundException("Unable to find the Resource Person");
        }
            
        $dept = $rsp->getDeptName();
        $courses = $em->getRepository('ABCAdminResourceAdminBundle:Course')->findBy(array('deptName' => $dept));
        
        if($courses != null)
        return $this->render('ABCAdminResourceAdminBundle:rsp:rspCourseAdd.html.twig', array('id' => $id, 'courses' => $courses)); 
        else
        return $this->render('ABCAdminResourceAdminBundle:rsp:rspCourseAdd.html.twig', array('id' => $id, 'error' =>'no course found for your department'));     
            return;    
        
        }
        
    public function assignToCoursesAction(Request $request,$id){
 
        $size = $request->get('total');
        $courses = array();

        $conn = $this->getDoctrine()->getEntityManager()->getConnection();
        for($i=0;$i<$size;$i++){
            if($request->get("$i")!=null){
                $title = $request->get("$i");
                
                $sql = "SELECT `course_id` FROM `course` WHERE `title`='$title'";
                $result = $conn->executeQuery($sql)->fetchAll();
               $course_id = $result[0]['course_id'];
                $courses[$i]=$course_id;
                
              $sql = "INSERT INTO `teaches`(`rp_id`, `course_id`) VALUES ('$id','$course_id')";
              $conn->executeUpdate($sql);  
            }            
            
        }
        
        // entity manager
       
       
        
        
       
        
       return $this->render('ABCAdminResourceAdminBundle:rsp:result.html.twig',array('id'=>$id,'choices'=>$size,'courses'=>  var_dump($result)));
    }    
    
    
}
