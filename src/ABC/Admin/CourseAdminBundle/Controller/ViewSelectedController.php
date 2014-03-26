<?php
namespace ABC\Admin\CourseAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class ViewSelectedController extends Controller {
    public function SelectedStudentsAction($course){
        
        $em = $this->getDoctrine()->getEntityManager();
        $repository = $em->getRepository('ABCAdminCourseAdminBundle:Course');
        $course_name = $repository->findOneBy(array('courseId' =>$course ));

        $stmt = $this->getDoctrine()->getEntityManager()
                ->getConnection()
                ->prepare("SELECT * FROM applicant where status like 'Selected%' and course_id ='".$course."'");
        $stmt->execute();
        $selected_students = $stmt->fetchAll();
        return $this->render('ABCAdminCourseAdminBundle:View_Selected:view_selected.html.twig', array('selected_students' => $selected_students, 'course' => $course_name));
        

    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

