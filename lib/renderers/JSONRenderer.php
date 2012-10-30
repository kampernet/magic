<?php
/**
 * echo the response as JSON
 * 
 * @package lib/renderers
 */
class JSONRenderer implements RenderInterface {
	
	public function render(Response $response) { 
		header("Content-Type: text/javascript");
		header("Cache-Control: no-cache, must-revalidate");
		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
		echo json_encode($response);
	}
}