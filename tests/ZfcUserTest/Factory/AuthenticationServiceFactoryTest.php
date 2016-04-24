<?php
namespace ZfcUserTest\Factory;

use Zend\ServiceManager\ServiceManager;
use ZfcUser\Factory\AuthenticationServiceFactory;

class AuthenticationServiceFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testFactory()
    {
    	$serviceManager = new ServiceManager; // ServiceManagerFactory::getServiceManager(); // new ServiceManager; // 
    	
    	$options = new \ZfcUser\Factory\ModuleOptionsFactory();
    	$serviceManager->setService('Config', array());
    	$serviceManager->setService('zfcuser_module_options', $options->createService($serviceManager));
    	
    	 
    	$serviceManager->setService('ZfcUser\Authentication\Adapter\Db', $this->getMock(
    			'ZfcUser\Authentication\Adapter\Db',
    			null,
    			array($serviceManager)
    	));
    	
    	$serviceManager->setService('ZfcUser\Authentication\Storage\Db', $this->getMock(
    			'ZfcUser\Authentication\Storage\Db',
    			null,
    			array($serviceManager)
    	));
    	
    	$authAdapter = new \ZfcUser\Authentication\Adapter\AdapterChainServiceFactory();
        $serviceManager->setService('ZfcUser\Authentication\Adapter\AdapterChain', 
        		//$authAdapter->createService($serviceManager)
        		$this->getMock('ZfcUser\Authentication\Adapter\AdapterChain')
        );
        
        $factory = new AuthenticationServiceFactory;

        $this->assertInstanceOf('Zend\Authentication\AuthenticationService', $factory->createService($serviceManager));
    }
}
