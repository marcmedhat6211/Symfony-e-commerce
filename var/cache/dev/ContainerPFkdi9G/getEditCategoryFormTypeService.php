<?php

namespace ContainerPFkdi9G;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getEditCategoryFormTypeService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\Form\EditCategoryFormType' shared autowired service.
     *
     * @return \App\Form\EditCategoryFormType
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/FormTypeInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/AbstractType.php';
        include_once \dirname(__DIR__, 4).'/src/Form/EditCategoryFormType.php';

        return $container->privates['App\\Form\\EditCategoryFormType'] = new \App\Form\EditCategoryFormType();
    }
}
