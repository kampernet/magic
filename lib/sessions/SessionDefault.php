<?php
/**
 * use the PHP config default
 * 
 * @package lib/sessions
 */
class SessionDefault implements SessionInterface {
	
	/**
	 * (non-PHPdoc)
	 * @see SessionInterface::start()
	 */
	public function start() {
		session_start();
	}

}