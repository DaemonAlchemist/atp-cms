<?php

namespace ATPCms;

class Module extends \ATP\Module
{
	protected $_moduleName = "ATPCms";
	protected $_moduleBaseDir = __DIR__;
	
    public function onDispatch(\Zend\Mvc\MvcEvent $event)
    {
        $response = $event->getResponse();
        if (!method_exists($response, 'getStatusCode') || $response->getStatusCode() !== 404) {
            return;
        }
		
		//Remove base path from uri
        $request = $event->getRequest();
		$baseUrl = $request->getBaseUrl();
		$uri = $request->getUri()->getPath();
		$page = str_replace($baseUrl . "/", "", $uri);
		
		//Forward to proper CMS url if page exists
		if(!\ATPCms\Model\Page::exists($page)) return;
		
		//header("HTTP/1.1 301 Moved Permanently");
		//header("Location: {$baseUrl}/cms/{$page}");
		die();
    }

    public function onBootstrap(\Zend\EventManager\EventInterface $event)
    {
        // Attach for dispatch, and dispatch.error (with low priority to make sure statusCode gets set)
        $eventManager = $event->getTarget()->getEventManager();
        $callback     = array($this, 'onDispatch');
        $priority     = -99999;
        $eventManager->attach(\Zend\Mvc\MvcEvent::EVENT_DISPATCH,       $callback, $priority);
        $eventManager->attach(\Zend\Mvc\MvcEvent::EVENT_DISPATCH_ERROR, $callback, $priority);
    }
}
