<?php

namespace ABC\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Main\loginBundle\Modals\Login;

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
    
    public function loginAction(Request $request) {
        $session = $this->getRequest()->getSession();
        $em = $this->getDoctrine()->getEntityManager();
        $repository = $em->getRepository('ABCHomeBundle:Login');
        if ($request->getMethod() == 'POST') {
            $session->clear();
            $userName = $request->get('Username');
            $passWord = $request->get('Password');
            $remember = $request->get('Remember');
            $user = $repository->findOneBy(array('username' => $userName, 'password' => $passWord));
            if ($user) {
                if ($remember == "remember-me") {
                    $login = new Login();
                    $login->getUsername($userName);
                    $login->getPassword($passWord);
                    $session->set('login', $login);
                }
                return $this->render('ABCHomeBundle:Site:index.html.twig', array('name' => $user->getUsername()));
            } else {
                return $this->render('ABCHomeBundle:Site:login.html.twig', array('name' => 'Error in login data!'));
            }
        } else {
            if ($session->has('login')) {
                $login = $session->get('login');
                $userName = $login->getUsername();
                $passWord = $login->getPassword();
                $user = $repository->findOneBy(array('username' => $userName, 'password' => $passWord));
                if ($user) {
                    return $this->render('ABCHomeBundle:Site:index.html.twig', array('name' => $user->getUsername()));
                }
            }
            return $this->render('ABCHomeBundle:Site:login.html.twig');
        }
    }
    
    public function startAction() {
        return $this->render('ABCHomeBundle:Default:start.html.twig', array('name' =>'Wajji'));
    }
}
