<?php
// src/Acme/DemoBundle/Admin/PostAdmin.php

namespace Admin\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ProduitAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $groupOption = array(
            'class' => 'Projet0\Homepage\LoginBundle\Entity\Group',
            'property' => 'name',
            'multiple' => true
            );
        if (!$this->id($this->getSubject())) {
            
        }
        $formMapper
            ->add('username')
            ->add('email')
            ->add('firstname')
            ->add('lastname')
            ->add('groups', 'entity', $groupOption)
            ->add('enabled')
            ->add('password', 'text', array(
                'label' => 'password'
                ))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('username')
            ->add('email')
            ->add('firstname')
            ->add('lastname')
            ->add('groups')
            ->add('enabled')
            ->add('password')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('username')
            ->add('email')
            ->add('firstname')
            ->add('lastname')
            ->add('groups')
            ->add('enabled')
            ->add('password')
            ->add('_action', 'actions', array('actions'=> array(
                'show' => array(),
                'edit' => array(),
                'delete' => array()
                )))
        ;
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('username')
            ->add('email')
            ->add('firstname')
            ->add('lastname')
            ->add('groups')
        ;
    }
}