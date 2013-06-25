<?php
/**
 * routes the request
 * 
 * @package lib/filters
 */
class RequestRoutingFilter extends BaseFilter {
	
	/**
	 * (non-PHPdoc)
	 * @see FilterChainInterface::applyFilter()
	 */
	public function applyFilter() { 

		$uri = "/".implode("/", $this->request->path);
		$route = Application::getInstance()->actions->xpath("action[@uri='$uri']");

		if (isset($route[0])) { 
			$this->request->path[0] = (string) $route[0]->attributes()->class;
			$this->request->path[1] = (string) $route[0]->attributes()->method;
		} else {
			if (empty($this->request->path)) {
				$this->request->path = array(
					"index", "__default"
				);					
			} else {
				if (!isset($this->request->path[1])) {
					$this->request->path[1] = "__default";
				}
			}
		}
	}
}