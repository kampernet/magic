<?php
/**
 * render the response
 * 
 * @package lib/filters
 */
class RenderFilter extends BaseFilter {
	
	/**
	 * (non-PHPdoc)
	 * @see FilterChainInterface::applyFilter()
	 */
	public function applyFilter() {
		$this->request->response->render();
	}
}