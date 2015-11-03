<?php

namespace Projet0\Homepage\LoginBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sonata\AdminBundle\Controller\CoreController;

class AdminController extends CoreController
{
    public function indexAction()
    {
        $blocks = array(
            'top'    => array(),
            'left'   => array(),
            'center' => array(),
            'right'  => array(),
            'bottom' => array(),
        );

        foreach ($this->container->getParameter('sonata.admin.configuration.dashboard_blocks') as $block) {
            $blocks[$block['position']][] = $block;
        }
        return $this->render('AdminAdminBundle:ProduitAdmin:dashboard.html.twig', 
                array('base_template'   => $this->getBaseTemplate(),
                	'admin_pool'      => $this->container->get('sonata.admin.pool'),
                	'blocks'          => $blocks
                	));
    }
}
