<?php

namespace ABC\Admin\ResourceAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ABCAdminResourceAdminBundle:Default:index.html.twig');
    }
}
