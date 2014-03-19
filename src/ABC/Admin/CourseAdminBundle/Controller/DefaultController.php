<?php

namespace ABC\Admin\CourseAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ABCAdminCourseAdminBundle:Default:index.html.twig', array('name' => $name));
    }
}
