<?php
/**
 * this Command class is just to store the previous command 
 * at a superclass level
 * 
 * @package lib/base/actions 
 */
abstract class Command implements CommandInterface {
	/**
	 * 
	 * a place to store the previous command for 
	 * automatic undo within a chain.
	 * 
	 * @var CommandInterface
	 */
	public $previous;
}