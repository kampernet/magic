<?php
/**
 * works with the XML renderer and uses an XSL template
 * 
 * @package lib/renderers
 */
class XSLTRenderer implements RenderInterface {
	
	/**
	 * (non-PHPdoc)
	 * @see RenderInterface::render()
	 */
	public function render(Response $response) { 
		
		$renderer = new XMLRenderer();
		$xml = $renderer->to_domdocument($response);

		$xsl = new DOMDocument;
		
		$templates = Environment::getInstance()->templates;
		$path = realpath(dirname(__FILE__) . "/$templates");

		$template = 'index';
		$xsl->load("$path/$template.xsl");
		
		$proc = new XSLTProcessor;
		$proc->importStyleSheet($xsl);
		
		header("Cache-Control: no-cache, must-revalidate");
		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
		echo $proc->transformToXML($xml);
	}
}