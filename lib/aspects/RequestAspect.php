<?php
/**
 * injects the request object onto the model
 * @package lib/aspects
 */
class RequestAspect implements AspectInterface {
	
	/**
	 * @match before.*Init
	 */
	public function injectRequest() {
		$this->setRequest(Request::getInstance());
	}
	
}