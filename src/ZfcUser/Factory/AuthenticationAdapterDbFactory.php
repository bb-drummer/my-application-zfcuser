<?php
namespace ZfcUser\Factory;

use ZfcUser\Authentication\Adapter\Db as ZfcUserAuthenticationAdapterDb;
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
        return new ZfcUserAuthenticationAdapterDb($realServiceLocator);
    }
}