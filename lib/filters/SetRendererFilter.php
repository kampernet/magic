<?php
/**
 * sets what renderer to use based on the url of the request
 * 
 * @package lib/filters
 */
class SetRendererFilter extends BaseFilter {

	/**
	 * TODO parse the extension instead of a new path part.
	 * (non-PHPdoc)
	 * @see FilterChainInterface::applyFilter()
	 */
	public function applyFilter() {
		if (isset($this->request->path[0])) {
			switch ($this->request->path[0]) {
				case "json":
					$this->request->response->setRenderer(new JSONRenderer());
					array_shift($this->request->path);
					break;
				case "xml":
					$this->request->response->setRenderer(new XMLRenderer());
					array_shift($this->request->path);
					break;
				default:
					$this->request->response->setRenderer($this->lookupRenderer());
					break;
			}
		} else {
			$this->request->response->setRenderer($this->lookupRenderer());
		}
	}
	
	/**
	 * @return RenderInterface 
	 */
	private function lookupRenderer() {
		$renderClass = (string) Environment::getInstance()->renderer;
		if (trim($renderClass) == '') {
			$renderClass = "PHPRenderer";
		}
		return new $renderClass();
	}
}