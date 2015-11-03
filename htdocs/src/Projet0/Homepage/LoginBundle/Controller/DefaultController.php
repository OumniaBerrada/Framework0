<?php

namespace Projet0\Homepage\LoginBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('Projet0HomepageLoginBundle:Default:index.html.twig');
    }
    public function loginAction()
    {
       return $this->redirect($this->generateUrl('fos_user_security_login'));
    }
     public function totoAction()
    {
        return $this->render('Projet0HomepageLoginBundle:Default:toto.html.twig');
    }

     public function formmailAction()
    {
        return $this->render('Projet0HomepageLoginBundle:Default:contactEmail.html.twig');
    }

   public function mailAction()
    {
        $adressemail =  $_POST['emailaddress'];
        $sujetmail =  $_POST['sujet'];
        $bodymail =  $_POST['message'];
        $message = \Swift_Message::newInstance()
            ->setSubject($sujetmail)
            ->setFrom('test@gmail.com')
            ->setTo($adressemail)
            ->setBody($bodymail)
        ;
        $res = $this->get('mailer')->send($message);
        if ($res == true)
            return $this->render('Projet0HomepageLoginBundle:Default:index.html.twig');
        else
            return $this->render('Projet0HomepageLoginBundle:Default:index.html.twig');
    }

}