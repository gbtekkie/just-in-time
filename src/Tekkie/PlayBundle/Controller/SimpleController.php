<?php

namespace Tekkie\PlayBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tekkie\PlayBundle\Entity\Product;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class SimpleController extends Controller {
    
    /**
     * @Route("/", name="_simple")
     * @Template()
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getEntityManager();
        $products = $em->getRepository( 'TekkiePlayBundle:Product' )
            ->findAllOrderedByName();
        return( array(
            'products' => $products
        ) );
    }
    
    public function oldAction()
    {
        // try to find product by id
        $product = $this->getDoctrine()->getRepository( 'TekkiePlayBundle:Product' )->find( 2 );
        
        if( ! $product ) {
            $product = new Product();
            $product->setName( 'The newest magazine on mobile dev' );
            $product->setPrice( 0.99 );
            $product->setDescription( 'breaking the ice yet again' );

            $em = $this->getDoctrine()->getEntityManager();
            $em->persist( $product );
            $em->flush();
        }
        
        return array(
            'varNotNull' => 'Testing, testing...',
            'varIsNull'  => null,
            'product' => $product
        );
    }
    
}

?>
