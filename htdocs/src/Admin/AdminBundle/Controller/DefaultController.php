<?php

namespace Admin\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sonata\AdminBundle\Controller\CoreController;

class DefaultController extends CoreController
{
    public function indexAction()
    {
    	$admin_pool = $this->get('sonata.admin.pool');
    	return $this->render('AdminAdminBundle:ProduitAdmin:dashboard.html.twig', 
                array('admin_pool'    => $admin_pool));
    }

    
}
