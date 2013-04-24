<?php
/**
 * puts the session object on the request
 * 
 * @package lib/filters
 */
class SessionFilter extends BaseFilter {
	
	/**
	 * (non-PHPdoc)
	 * @see FilterChainInterface::applyFilter()
	 */
	public function applyFilter() {
		$this->request->session = Session::getInstance();
	}
}