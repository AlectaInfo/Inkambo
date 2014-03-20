<?php

namespace ABC\Admin\ResourceAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ABCAdminResourceAdminBundle:Default:index.html.twig', array('name' => $name));
    }
}
