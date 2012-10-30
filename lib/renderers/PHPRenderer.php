<?php
/**
 * use PHP templates.  $response is available to the templates
 * 
 * @package lib/renderers
 */
class PHPRenderer implements RenderInterface {
	
	/**
	 * (non-PHPdoc)
	 * @see RenderInterface::render()
	 */
	public function render(Response $response) {
		$templates = Environment::getInstance()->templates;
		$path = realpath(dirname(__FILE__) . "/$templates");
		$template = Request::getInstance()->path[0]; 
		include "$path/$template.phtml";
	}
}