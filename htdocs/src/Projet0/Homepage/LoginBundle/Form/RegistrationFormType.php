<?php
 
namespace Projet0\Homepage\LoginBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;
 
class RegistrationFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder
            ->add('firstname', 'text', array('label' => 'Prénom'))
            ->add('lastname', 'text', array('label' => 'Nom'));
    }

    public function getName()
    {
        return 'projet_client_registration';
    }
}
