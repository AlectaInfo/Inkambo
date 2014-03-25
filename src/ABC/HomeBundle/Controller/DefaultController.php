<?php

namespace ABC\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ABCHomeBundle:Site:index.html.twig');
    }
    
    public function aboutAction()
    {
        return $this->render('ABCHomeBundle:Site:about.html.twig');
    }
    
    public function coursesAction()
    {
        return $this->render('ABCHomeBundle:Site:courses.html.twig');
    }
    
    public function instructorsAction()
    {
        return $this->render('ABCHomeBundle:Site:instructors.html.twig');
    }
    
    public function contactusAction()
    {
        return $this->render('ABCHomeBundle:Site:contact_us.html.twig');
    }
    
    public function startAction() {
        return $this->render('ABCHomeBundle:Default:start.html.twig', array('name' =>'Wajji'));
    }
}
