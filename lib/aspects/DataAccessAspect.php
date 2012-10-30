<?php
/**
 * injects the data access implementation to model objects
 * @package lib/aspects
 */
class DataAccessAspect implements AspectInterface {
	
	/**
	 * @match before.*Init
	 */
	public function injectConnection() {
		$this->setDAO(ConnectionProvider::getInstance()->getConnection());
	}

}