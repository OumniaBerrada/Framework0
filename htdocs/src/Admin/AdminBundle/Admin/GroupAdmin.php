<?php

namespace Admin\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Projet0\Homepage\LoginBundle\Entity\Group;

class GroupAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $roleOption = array(
            'multiple' => true,
            'choices' => Group::$rolesChoices
            );
        if (!$this->id($this->getSubject()))
             $roleOption['data'] = array(Group::defaultRole);
        
        $formMapper
            ->add('name')
            ->add('roles', 'choice', $roleOption)
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('name')
            ->add('roles')

        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('name')
            ->add('roles')
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
            ->add('id')
            ->add('name')
            ->add('roles')
        ;
    }
}