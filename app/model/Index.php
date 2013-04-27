<?php
/**
 * use the has annotation to weave aspects 
 * 
 * use the table annotation to set the table ( ActiveRecord pattern ) 
 * 
 * use the model annotation for any object properties 
 * if you want to inject dependencies ( MDA / Object Graph / DI ) 
 * 
 * NOTE: you can use a comma separated list of Aspects this Model has
 * eg: has Request, DataAccess
 *
 * @has Request
 * @package app/model
 */
class Index extends Model {

	/**
	 * (non-PHPdoc)
	 * @see Model::__default()
	 */
	public function __default() {
		return $this->getRequest()->params;
	}
}