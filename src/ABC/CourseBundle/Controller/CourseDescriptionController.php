<?php

namespace ABC\CourseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use Symfony\Component\HttpFoundation\Request;

class CourseDescriptionController extends Controller {
    public function ViewCourseAction(){
        $em = $this->getDoctrine()->getEntityManager();
        $repository1 = $em->getRepository('ABCCourseBundle:Course');
    //    $repository2 = $em->getRepository('ABCCourseBundle:Session');

        $courses = $repository1->findAll();
        
        $view_courses_array;
        
        foreach($courses as $course){
            $stmt = $em
                ->getConnection()
                ->prepare("SELECT * FROM view_courses where course_id =". "'".$course->getCourseId()."' and year = '2014'"   );
        $stmt->execute();
        $result = $stmt->fetchAll();
        $view_courses_array[$course->getCourseId()] = $result;
         //   $sessions = $repository2->findBy(array('course' => $course->getCourseId()));
         //   $session_array[$course->getCourseId()] = array($session); 
        }
        
        return $this->render('ABCCourseBundle:viewcourses:courseDescription.html.twig', array('courses' => $courses, 'all_courses' => $view_courses_array));
    }
}

