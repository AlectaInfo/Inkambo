<?php

namespace ABC\ApplicantBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ABCApplicantBundle:Default:index.html.twig', array('name' => $name));
    }
}
