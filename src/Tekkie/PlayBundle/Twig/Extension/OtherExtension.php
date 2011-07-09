<?php

namespace Tekkie\PlayBundle\Twig\Extension;

use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Bundle\TwigBundle\Loader\FilesystemLoader;

class OtherExtension extends \Twig_Extension
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
            'playMethod' => new \Twig_Function_Method($this, 'getPlayMethod'),
        );
    }
    public function getFilters() {
        return( array(
            'x_dump' => new \Twig_Filter_Function('var_dump'),
        ) );
    }

    public function getPlayMethod( $item )
    {
        return 'PLAY_' . ( is_null( $item ) ? 'null' : sprintf( '"%s"', $item ) );
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'other';
    }
}
