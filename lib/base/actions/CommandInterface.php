<?php
/**
 * the command interface
 * 
 * @package lib/base/actions
 */
interface CommandInterface {
	
	/**
	 * The command execute method
	 * @param AbstractRequest $request
	 * @return boolean
	 */
	public function execute(AbstractRequest &$request);
	
	/**
	 * The command undo method
	 */
	public function undo();
}