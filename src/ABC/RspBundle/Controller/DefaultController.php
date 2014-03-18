<?php

namespace ABC\RspBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ABCRspBundle:Default:index.html.twig', array('name' => $name));
    }
}
