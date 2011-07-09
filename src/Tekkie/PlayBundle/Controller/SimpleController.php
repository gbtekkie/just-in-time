<?php

namespace Tekkie\PlayBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class SimpleController extends Controller {
    
    /**
     * @Route("/", name="_simple")
     * @Template()
     */
    public function indexAction()
    {
        return array(
            'varNotNull' => 'Testing, testing...',
            'varIsNull'  => null
        );
    }
    
}

?>
