<?php
/**
 * echo the response as JSON
 * 
 * @package lib/renderers
 */
class JSONRenderer implements RenderInterface {
	
	/**
	 * (non-PHPdoc)
	 * @see RenderInterface::sendHeaders()
	 */
	public function sendHeaders(Response $response) {
		header("Content-Type: text/javascript");
		header("Cache-Control: no-cache, must-revalidate");
		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
	}
	
	/**
	 * (non-PHPdoc)
	 * @see RenderInterface::render()
	 */
	public function render(Response $response) { 
		return json_encode($response);
	}
}