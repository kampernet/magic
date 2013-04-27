<?php
/**
 * makes a model object REST aware
 *
 * @package lib/aspects
 */
class RestfulMethodMappingAspect implements AspectInterface, RestfulModelInterface {

	/**
	 * @match before.*__default
	 */
	public function makeRestAware() {

		$this->populate($this->getRequest()->params);

		$map = array(
			'POST' => 'save',
			'PUT' => 'save',
			'DELETE' => 'delete',
			'GET' => 'fetch',
			'HEAD' => 'head',
			'OPTIONS' => 'options',
			'TRACE' => 'trace',
			'CONNECT' => 'connect'
		);

		$method = $map[$this->getRequest()->server['REQUEST_METHOD']];

		$this->$method();
	}

}