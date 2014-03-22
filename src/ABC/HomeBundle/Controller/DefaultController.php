<?php

namespace ABC\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ABCHomeBundle:Default:home.html.twig');
    }
}
