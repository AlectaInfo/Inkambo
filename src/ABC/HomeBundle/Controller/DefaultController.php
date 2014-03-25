<?php

namespace ABC\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ABCHomeBundle:Default:home.html.twig');
    }
    
    public function startAction() {
        return $this->render('ABCHomeBundle:Default:start.html.twig', array('name' =>'Wajji'));
    }
}
