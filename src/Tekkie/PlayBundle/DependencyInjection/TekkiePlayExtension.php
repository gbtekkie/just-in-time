<?php

namespace Tekkie\PlayBundle\DependencyInjection;
use Symfony\Component\DependencyInjection\Definition;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\Config\FileLocator;

class TekkiePlayExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
//        $definition = new Definition('Tekkie\PlayBundle\Twig\Extension\DemoExtension');
//        // this is the most important part. Later in the startup process TwigBundle
//        // searches through the container and registres all services taged as twig.extension.
//        $definition->addTag('twig.extension');
//        $container->setDefinition('demo', $definition);
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');
    }

    public function getAlias()
    {
        return 'tekkie_play';
    }
}
