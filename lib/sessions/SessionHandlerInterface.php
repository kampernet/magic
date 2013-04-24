<?php
/**
 * the interface for session handlers
 * 
 * @package lib/sessions
 */
interface SessionHandlerInterface {
	/**
	 * start the session
	 */
	public function start();
}