<?php

namespace ABC\CourseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use Symfony\Component\HttpFoundation\Request;

class CourseDescriptionController extends Controller {
    public function ViewCourseAction(){
        $em = $this->getDoctrine()->getEntityManager();
        $repository = $em->getRepository('ABCCourseBundle:Course');
    }
}

