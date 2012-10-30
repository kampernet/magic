<?php
/**
 * set Cookies on the Request
 * 
 * @package lib/filters
 */
class CookiesFilter extends BaseFilter {

	/**
	 * (non-PHPdoc)
	 * @see FilterChainInterface::applyFilter()
	 */
	public function applyFilter() {
		if (isset($_COOKIE)) {
			$this->request->cookies = Cookies::getInstance();
		}
	}
	
}