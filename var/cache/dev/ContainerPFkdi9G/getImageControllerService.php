<?php

namespace ContainerPFkdi9G;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getImageControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Controller\ImageController' shared autowired service.
     *
     * @return \App\Controller\ImageController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/src/Controller/ImageController.php';

        $container->services['App\\Controller\\ImageController'] = $instance = new \App\Controller\ImageController();

        $instance->setContainer(($container->privates['.service_locator.5nX7ca3'] ?? $container->load('get_ServiceLocator_5nX7ca3Service'))->withContext('App\\Controller\\ImageController', $container));

        return $instance;
    }
}
