<?php

namespace ABC\CourseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ABCCourseBundle:updatecourse:CourseAdmin.html.twig');
    }
}
