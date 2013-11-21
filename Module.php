<?php

namespace Soflomo\LocalScript;

use Zend\ModuleManager\Feature;
use Zend\EventManager\EventInterface;
use Zend\Mvc\MvcEvent;

class Module implements
    Feature\ConfigProviderInterface,
    Feature\BootstrapListenerInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function onBootstrap(EventInterface $e)
    {
        $app = $e->getApplication();
        $sl  = $app->getServiceManager();
        $em  = $app->getEventManager();

        $em->attach(MvcEvent::EVENT_RENDER, function($e) use ($sl) {
            $config  = $sl->get('Config');
            $config  = $config['soflomo_local_script'];

            $manager = $sl->get('ViewHelperManager');
            $name    = $config['helper'];
            $plugin  = $manager->get($name);

            $files   = $config['files'];
            foreach ($files as $file) {
                $plugin->appendFile($file);
            }
        });
    }
}