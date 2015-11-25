<?php
namespace Projet0\Homepage\LoginBundle\Form\Handler;

use FOS\UserBundle\Form\Handler\RegistrationFormHandler as BaseHandler;
use FOS\UserBundle\Model\UserInterface;
use FOS\UserBundle\Model\UserManagerInterface;
use FOS\UserBundle\Mailer\MailerInterface;
use FOS\UserBundle\Util\TokenGeneratorInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Projet0\Homepage\LoginBundle\Entity\Group;

class RegistrationFormHandler extends BaseHandler
{
    private $container;
    private $defaultGroup = Group::defaultGroup;

    public function __construct(FormInterface $form, Request $request, UserManagerInterface $userManager, MailerInterface $mailer, TokenGeneratorInterface $tokenGenerator, ContainerInterface $container)
    {
        parent::__construct($form, $request, $userManager, $mailer, $tokenGenerator);
        $this->container = $container;
    }

    protected function onSuccess(UserInterface $user, $confirmation)
    {
        // Note: if you plan on modifying the user then do it before calling the
        // parent method as the parent method will flush the changes
        /* @var $user \Projet0\Homepage\LoginBundle\Entity\User */
        $group = $this->container->get('doctrine')->getEntityManager()->getRepository('Projet0HomepageLoginBundle:Group')->findOneByName($this->defaultGroup);
        if ($group)
            $user->addGroup($group);
        parent::onSuccess($user, $confirmation);

        // otherwise add your functionality here
    }
}