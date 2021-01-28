<?php

namespace ContainerPFkdi9G;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getFileUploaderService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\Services\FileUploader' shared autowired service.
     *
     * @return \App\Services\FileUploader
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/src/Services/FileUploader.php';

        return $container->privates['App\\Services\\FileUploader'] = new \App\Services\FileUploader($container);
    }
}
