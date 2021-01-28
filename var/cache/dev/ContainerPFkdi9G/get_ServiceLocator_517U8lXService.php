<?php

namespace ContainerPFkdi9G;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_517U8lXService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.517U8lX' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.517U8lX'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'accessoryRepository' => ['privates', 'App\\Repository\\AccessoryRepository', 'getAccessoryRepositoryService', true],
            'product' => ['privates', '.errored..service_locator.517U8lX.App\\Entity\\Product', NULL, 'Cannot autowire service ".service_locator.517U8lX": it references class "App\\Entity\\Product" but no such service exists.'],
        ], [
            'accessoryRepository' => 'App\\Repository\\AccessoryRepository',
            'product' => 'App\\Entity\\Product',
        ]);
    }
}