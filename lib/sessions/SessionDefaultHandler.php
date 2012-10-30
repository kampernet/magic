<?php
/**
 * use the PHP config default
 * 
 * @package lib/sessions
 */
class SessionDefaultHandler implements SessionHandlerInterface {
	
	/**
	 * (non-PHPdoc)
	 * @see SessionHandlerInterface::start()
	 */
	public function start() {
		session_start();
	}
}