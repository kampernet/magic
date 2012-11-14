<?php
/**
 * use PHP templates.  $response is available to the templates
 * 
 * @package lib/renderers
 */
class PHPRenderer implements RenderInterface {
	
	/**
	 * (non-PHPdoc)
	 * @see RenderInterface::sendHeaders()
	 */
	public function sendHeaders(Response $response) {
		
	}
	
	/**
	 * (non-PHPdoc)
	 * @see RenderInterface::render()
	 */
	public function render(Response $response) {
		$templates = Environment::getInstance()->templates;
		$path = realpath(dirname(__FILE__) . "/$templates");
		$template = Request::getInstance()->path[0];		
		return $this->getIncludeContents("$path/$template.phtml", $response);

	}
	
	/**
	 * 
	 * @param string $filename
	 * @param Response $response
	 * @return Ambiguous string or false
	 */
	private function getIncludeContents($filename, Response $response) {
		if (is_file($filename)) {
			ob_start();
			include $filename;
			return ob_get_clean();
		}
		return false;
	}
}