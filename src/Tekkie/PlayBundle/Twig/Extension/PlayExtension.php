<?php

namespace Tekkie\PlayBundle\Twig\Extension;

use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Bundle\TwigBundle\Loader\FilesystemLoader;

class PlayExtension extends \Twig_Extension
{
    protected $loader;
    protected $controller;

    public function __construct(FilesystemLoader $loader)
    {
        $this->loader = $loader;
    }

    public function setController($controller)
    {
        $this->controller = $controller;
    }

    public function getFunctions()
    {
        return array(
            'quoteWithNull' => new \Twig_Function_Method($this, 'getQuoteWithNull'),
        );
    }
    public function getFilters() {
        return( array(
            'a_dump' => new \Twig_Filter_Function('var_dump'),
        ) );
    }

    public function getQuoteWithNull( $item )
    {
        return( is_null( $item ) ? 'null' : sprintf( '"%s"', $item ) );
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'play';
    }
}
