<?php

namespace ABC\CourseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CourseHomeController extends Controller {

    public function ShowCoursesAction() {
        $em = $this->getDoctrine()->getEntityManager();
        $repository1 = $em->getRepository('ABCCourseBundle:Department');
        $repository2 = $em->getRepository('ABCCourseBundle:Course');
        $departments = $repository1->findAll();
   //     $courses = $repository1->findAll();
        /*    foreach ($departments as $value) {

          echo $value->getName();
          } */

        /* $query = $em->createQuery(
          'SELECT p FROM ABCCourseBundle:Applicant p WHERE p.price > :price ORDER BY p.price ASC'
          )->setParameter('price', '19.99');
          $topCourses = $query->getResult(); */

        $stmt = $this->getDoctrine()->getEntityManager()
                ->getConnection()
                ->prepare('SELECT course_id FROM applicant GROUP BY course_id ORDER BY COUNT( app_id ) DESC LIMIT 5');
        $stmt->execute();
        $result = $stmt->fetchAll();
        $dynamic_array;
        foreach($departments as $value){
            $course = $repository2->findBy(array('deptName' => $value));
            $dynamic_array[$value->getName()] = $course; 
        }

        return $this->render('ABCCourseBundle:viewcourses:course_home.html.twig', array('departments' => $departments, 'dynamic_courses' => $dynamic_array, 'top_courses' => $result));
    }

    public function SearchCourseAction(Request $request) {
        
    }

}
