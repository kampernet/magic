<?php
/**
 * all requests that aren't to static files get routed here via .htaccess
 * mod rewrite rules.
 */

try {
	require "../bootstrap.php"; // prepare autoloader

	$d = new Delegator(); // instantiate the delegator
	EventListenerRegister::registerEventListeners($d); // register event listeners
	$request = Request::getInstance();
	FilterManager::applyPreFilters($request); // apply pre processing filters on the request
	
	/*
	 * perform the action of the request
	 * through the delegator / di container
	 */
	$request->response->data[$request->path[0]] = $d->delegate($request); 
	
} catch (Exception $e) {
	Request::getInstance()->response->addMessage($e->getMessage(), 'error');
}

try {
	FilterManager::applyPostFilters($request); // apply post processing filters on the request
} catch(Exception $e) {
	
}

/*
 * render and output the response
 */
Request::getInstance()->response->sendHeaders();
echo Request::getInstance()->response->render();