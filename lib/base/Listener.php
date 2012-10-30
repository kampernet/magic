<?php
/**
 * the base class for all Listeners
 * 
 * @package lib/base
 */
abstract class Listener {
	
	/**
	 * @var Model
	 */
	public $model;
	
	/**
	 * constructor
	 * @param Model $model
	 */
	public function __construct(Model $model) {
		$this->model = $model;		
	}
}