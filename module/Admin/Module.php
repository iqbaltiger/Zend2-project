<?php

namespace Admin;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;



use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\Authentication\Storage;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Adapter\DbTable as DbTableAuthAdapter;
use Admin\Model\AdminTable;

class Module
{   
    
    public function onBootstrap(MvcEvent $e) {
        
        

        
        $em  = $e->getApplication()->getEventManager();

        $em->attach(MvcEvent::EVENT_DISPATCH, function($e) {
            $controller = $e->getTarget();
            if ($controller instanceof Controller\AdminController) {   
                $controller->layout('layout/layoutadmin.phtml');
            } else {
                $controller->layout('layout/layout.phtml');
            }   
        });
    }
    
    
    
    
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Admin\Model\AdminTable' =>  function($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $table = new AdminTable($dbAdapter);
                    return $table;
                },
            ),
        );
    }    

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
}