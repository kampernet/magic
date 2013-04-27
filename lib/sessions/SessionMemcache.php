<?php
/**
 * use the memcache session handler
 * 
 * @package lib/sessions
 */
class SessionMemcache implements SessionInterface {
	
	/**
	 * (non-PHPdoc)
	 * @see SessionInterface::start()
	 */
	public function start() {

		/*
		 * in configuration.xml for example put
		 * <constant name="memcacheServer" value="127.0.0.1" /> 
		 * <constant name="memcachePort" value="11211" /> 
		 * in constants if you want to use this 
		 */
		$memcacheServer = Environment::getInstance()->memcacheServer;
		$memcachePort = Environment::getInstance()->memcachePort;
		
		$server = "tcp://$memcacheServer:$memcachePort";

		// set the handlers
		ini_set("session.save_handler", "memcache");
		ini_set("session.save_path", $server);
		
		session_start();

	}
	
}