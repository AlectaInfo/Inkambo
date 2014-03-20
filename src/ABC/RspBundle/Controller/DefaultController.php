<?php

namespace ABC\RspBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ABCRspBundle:Default:home.html.twig');
    }
}
