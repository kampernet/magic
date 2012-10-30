<?php
/**
 * the interface for renderers
 * 
 * @package lib/base/renderers
 */
interface RenderInterface {
	/**
	 * process the response
	 * @param Response $response
	 */
	public function render(Response $response);
}