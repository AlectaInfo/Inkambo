<?php

namespace ABC\ContactUsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class ContactController extends Controller
{
    public function indexAction()
    {
        return $this->render('ABCContactUsBundle:Contact:index.html.twig');
    }
    
    public function contactAction(Request $request)
    {
        $form = $this->createForm(new ContactType());

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {
                $message = \Swift_Message::newInstance()
                    ->setSubject($form->get('subject')->getData())
                    ->setFrom($form->get('email')->getData())
                    ->setTo('bhagyah4@gmail.com')
                    ->setBody(
                        $this->renderView(
                            'ABCContactUsBundle:Contact:index.html.twig',
                            array(
                                'ip' => $request->getClientIp(),
                                'name' => $form->get('name')->getData(),
                                'message' => $form->get('message')->getData()
                            )
                        )
                    );

                $this->get('mailer')->send($message);

                $request->getSession()->getFlashBag()->add('success', 'Your email has been sent! Thanks!');

                return $this->redirect($this->generateUrl('ABCContactUs:Contact:index.html.twig'));
            }
        }

        return array(
            'form' => $form->createView()
        );
    }
    
    public function sendAction(Request $request)
    {
        $name = $request->get("name");
        $email = $request->get("email");
        $message = $request->get("message");

        $mail_to = 'bhagyah4@gmail.com';
        $subject = 'Message from Inkambo visitor '.$name;

        $body_message = 'From: '.$name."\n";
        $body_message .= 'E-mail: '.$email."\n";
        $body_message .= 'Message: '.$message;

        $headers = 'From: '.$email."\r\n";
        $headers = 'Reply-To: '.$email."\r\n";

        $mail_status = mail($mail_to, $subject, $body_message, $headers);

        if ($mail_status) { ?>
                <script language="javascript" type="text/javascript">
                        alert('Thank you for the message. We will contact you shortly.');
                        window.location = 'ABCContactUs:Contact:index.html.twig';
                </script>
        <?php
        }
        else { ?>
                <script language="javascript" type="text/javascript">
                        alert('Message failed. Please, send an email to gordon@template-help.com');
                        window.location = 'ABCContactUs:Contact:index.html.twig';
                </script>
        <?php
        }
    }
}
?>
         