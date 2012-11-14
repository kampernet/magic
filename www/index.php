<?php
/**
 * all requests that aren't to static files get routed here via .htaccess
 * mod rewrite rules.
 */
try {
	require "../bootstrap.php"; // prepare autoloader

	$d = new Delegator(); 
	EventListenerRegister::registerEventListeners($d);
	FilterManager::applyPreFilters(Request::getInstance());
	
	Request::getInstance()->response->data[Request::getInstance()->path[0]] = $d->delegate(Request::getInstance());
	
} catch (Exception $e) {
	Request::getInstance()->response->addMessage($e->getMessage(), 'error');
}

try {
	FilterManager::applyPostFilters(Request::getInstance());
} catch(Exception $e) {
	
}

Request::getInstance()->response->sendHeaders();
echo Request::getInstance()->response->render();