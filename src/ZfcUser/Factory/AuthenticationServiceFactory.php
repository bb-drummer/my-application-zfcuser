<?php
namespace ZfcUser\Factory;

use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Adapter;
use Zend\Authentication\Storage;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AuthenticationServiceFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
    	$authAdapterDb = new \ZfcUser\Authentication\Adapter\Db($serviceLocator);
    	if (!$serviceLocator->has('ZfcUser\Authentication\Adapter\Db')) {
    		$serviceLocator->setService('ZfcUser\Authentication\Adapter\Db', $authAdapterDb);
    	}
    	
        /* @var $authStorage Storage\StorageInterface */
        $authStorage = new \ZfcUser\Authentication\Storage\Db($serviceLocator);
		//$serviceLocator->setService('ZfcUser\Authentication\Storage\Db', $authStorage);
		//$authStorage = $serviceLocator->get('ZfcUser\Authentication\Storage\Db');
        
        /* @var $authAdapter Adapter\AdapterInterface */
        //$authAdapter = new \ZfcUser\Authentication\Adapter\AdapterChainServiceFactory(); 
        $authAdapter = $serviceLocator->get('ZfcUser\Authentication\Adapter\AdapterChain');

        return new AuthenticationService(
            $authStorage,
            $authAdapter
        );
    }
}
