<?php

namespace ContainerPFkdi9G;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCreateProductFormTypeService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\Form\CreateProductFormType' shared autowired service.
     *
     * @return \App\Form\CreateProductFormType
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/FormTypeInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/AbstractType.php';
        include_once \dirname(__DIR__, 4).'/src/Form/CreateProductFormType.php';

        return $container->privates['App\\Form\\CreateProductFormType'] = new \App\Form\CreateProductFormType();
    }
}