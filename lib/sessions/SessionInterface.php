<?php
/**
 * the interface for session handlers
 * 
 * @package lib/sessions
 */
interface SessionInterface {
	/**
	 * start the session
	 */
	public function start();
}