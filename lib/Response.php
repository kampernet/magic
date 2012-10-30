<?php
/**
 * an object to model the response 
 * the request has a response object
 * 
 * the response needs a render interface 
 * implementation
 * 
 * @package lib
 */
class Response {
	public $data = array();
	public $messages;
	private $renderer;
	
	public function setRenderer(RenderInterface $render) {
		$this->renderer = $render;
	}
	
	public function getRenderer() { 
		return $this->renderer;
	}
	
	/**
	 * render the response
	 * 
	 * @return string
	 */
	public function render() {
		return $this->renderer->render($this);
	}
	
	/**
	 * add a message to the response 
	 * 
	 * @param string $message
	 * @param string $type
	 * @return void
	 */
	public function addMessage($message, $type) {
		
		if (!isset($this->messages)) { 
			$this->messages = array();
		}
		array_push($this->messages, array(
			"message"=>array(
				"message"=>$message,
				"type"=>$type
			)
		));
	}

	/**
	 * redirect
	 * 
	 * @param string $url
	 * @return void
	 */
	public function redirect($url) {
		header("Location: " . $url);
		exit;
	}
}