<?php
//
namespace ABC\Admin\ResourceAdminBundle\Controller;

use ABC\Admin\ResourceAdminBundle\Entity\Session;
use ABC\Admin\ResourceAdminBundle\Form\SessionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


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
                
               $sql = "SELECT `course_id`,`title` FROM `course` WHERE `title`='$title'";
                $result = $conn->executeQuery($sql)->fetchAll();
               $course_id = $result[0];
               $courses[$i]=$course_id;
                
//              $sql = "INSERT INTO `teaches`(`rp_id`, `course_id`, `session_id`) VALUES ('$id','$course_id','A12')";
//              $conn->executeUpdate($sql);  
            }            
            
        }
        
        // entity manager    
      // return $this->render('ABCAdminResourceAdminBundle:rsp:result.html.twig',array('id'=>$id,'choices'=>$size,'courses'=>$courses));
         return $this->render('ABCAdminResourceAdminBundle:rsp:assignSessions.html.twig',array('courses'=>$courses,'id'=>$id));   
        
            }
    
    // create a custom form for session
         private function createCreateForm(Session $entity)
    {
        $form = $this->createForm(new SessionType(),$entity, array(
          //  'action' => $this->generateUrl('session_create,{'courseID:'}'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }   
    
    // new form displayed
     public function newAction($courseId,$id)
    {
        $entity = new Session();
        $form   = $this->createCreateForm($entity);

        return $this->render('ABCAdminResourceAdminBundle:Session:addForGivenCourse.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'id'=>$courseId,
            'id2'=>$id
        ));
    }
    
    public function createAction(Request $request,$courseId,$id)
    {
           $entity = new Session();
           $form = $this->createCreateForm($entity);
           $form->handleRequest($request);
        
          if($request->getMethod()=='POST'){
          $em = $this->getDoctrine()->getManager();
          $course = $em->getRepository('ABCAdminResourceAdminBundle:Course')->find($courseId);
          $entity->setCourse($course);
          $max = $entity->getClass()->getCapacity();
          $entity->setAvailable($max);        
          $em->persist($entity);
          $em->flush();
          
          $sessionId = $entity->getSessionId();
          $sql = "INSERT INTO `teaches`(`rp_id`, `course_id`, `session_id`) VALUES ('$id','$courseId','$sessionId')";
          $conn = $em->getConnection();
          $conn->executeUpdate($sql); 

            return $this->render('ABCAdminResourceAdminBundle:rsp:rspSuccess.html.twig',array('id'=>$id,'session'=>$sessionId,'course'=>$courseId));
        }

        return $this->render('ABCAdminResourceAdminBundle:Session:addForGivenCourse.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'id'=>$courseId
        ));
    }
    
    
}
