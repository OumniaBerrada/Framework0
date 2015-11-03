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
        if ($this->id($this->getSubject())) {
            $formMapper
                ->add('username')
                ->add('email')
                ->add('firstname')
                ->add('lastname')
                ->add('roles')
                ->add('enabled')
                ->add('password', 'text', array(
                    'label' => 'password'
                    ))
            ;
        }
        else {
            $formMapper
                ->add('username')
                ->add('email')
                ->add('firstname')
                ->add('lastname')
                ->add('roles')
                ->add('enabled')
                ->add('password', 'text', array(
                    'label' => 'password',
                    'data' => 'Admin'
                    ))
            ;
        }
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('username')
            ->add('email')
            ->add('firstname')
            ->add('lastname')
            ->add('roles')
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
            ->add('roles')
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
            ->add('roles')
        ;
    }
}