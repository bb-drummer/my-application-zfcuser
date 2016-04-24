<?php
namespace ZfcUser\Factory;

use ZfcUser\Authentication\Storage\Db as ZfcUserAuthenticationStorageDb;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AuthenticationAdapterDbFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        return new ZfcUserAuthenticationStorageDb($realServiceLocator);
    }
}