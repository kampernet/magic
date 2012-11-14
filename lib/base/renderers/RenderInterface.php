<?php
/**
 * the interface for renderers
 * 
 * @package lib/base/renderers
 */
interface RenderInterface {
	/**
	 * render the response
	 * @param Response $response
	 * @return string
	 */
	public function render(Response $response);
	/**
	 * send appropriate headers
	 * @param Response $response
	 * @return void
	 */
	public function sendHeaders(Response $response);
}