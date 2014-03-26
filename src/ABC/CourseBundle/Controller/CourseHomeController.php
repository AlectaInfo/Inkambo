<?php

namespace ABC\CourseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CourseHomeController extends Controller {

    public function ShowCoursesAction() {
        $em = $this->getDoctrine()->getEntityManager();
        $repository1 = $em->getRepository('ABCCourseBundle:Department');
        $repository2 = $em->getRepository('ABCCourseBundle:Course');
        $departments = $repository1->findAll();

        $stmt = $this->getDoctrine()->getEntityManager()
                ->getConnection()
                ->prepare('SELECT course_id FROM applicant GROUP BY course_id ORDER BY COUNT( app_id ) DESC LIMIT 5');
        $stmt->execute();
        $result = $stmt->fetchAll();

        $dynamic_array;

        foreach ($departments as $value) {
            $course = $repository2->findBy(array('deptName' => $value));
            $dynamic_array[$value->getName()] = $course;
        }

        return $this->render('ABCCourseBundle:viewcourses:course_home.html.twig', array('departments' => $departments, 'dynamic_courses' => $dynamic_array, 'top_courses' => $result));
    }

    public function SearchCoursesAction(Request $request) {
        if ($request->getMethod() == 'GET') {
            $department = $request->get('department');
            $course = $request->get('course');

            $cnnction = $this->getDoctrine()->getEntityManager()
                    ->getConnection();
            $result;
            if ($department == "All Courses") {
                $stmt = $cnnction->prepare("SELECT course_id,title FROM course where title like '%".$course."%' or course_id like '%".$course."%'" );
            } else {
                $stmt = $cnnction->prepare("SELECT course_id,title FROM course where dept_name = '".$department."' and (title like '%".$course."%' or course_id like '%".$course."%')" );
            }
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $this->render('ABCCourseBundle:viewcourses:search_results.html.twig', array('results' => $result));
        }

        
    }

}
