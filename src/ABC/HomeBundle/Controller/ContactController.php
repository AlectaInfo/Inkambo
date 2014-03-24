<?php

namespace ABC\HomeBundle\Controller;

use Swift_Message;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends Controller
{
    public function contactAction(Request $request) {

            if ($request->getMethod() == "POST") {
                $name = $request->get("name");
                $subject = $request->get("subject");
                $mes = $request->get("message");
                $email = $request->get("email");

                $message = Swift_Message::newInstance()
                            ->setSubject($subject)
                            ->setFrom($email)
                            ->setTo('bhagyah4@gmail.com')
                            ->setBody("Hello Bhagya, $mes");
                
                $this->get('mailer')->send($message);
                }
            return $this->render('ABCHomeBundle:Contact:contact.html.twig');
        }
}
?>
         
