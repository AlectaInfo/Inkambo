<?php

namespace ABC\CourseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CourseHomeController extends Controller
{
    public function ShowCoursesAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $repository = $em->getRepository('ABCCourseBundle:Department');
        $departments = $repository->findAll();
    /*    foreach ($departments as $value) {
            
            echo $value->getName();
        }*/
        return $this->render('ABCCourseBundle:StudentView:course_homepage.html.twig', array('departments' =>$departments) );
    }
}
