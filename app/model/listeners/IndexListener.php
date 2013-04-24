<?php
/**
 * an example Listener object.  see the application.xml file
 * for more info.  Listeners get bound to events by the 
 * EventListenerRegister
 * 
 * @package app/model/listeners
 */
class IndexListener extends Listener {
	
	/**
	 * just do demonstrate how listeners hook in
	 */
	public function thisIsAnExample() {
		$this->model->getRequest()->params['pow'] = 'hello from IndexListener';
	}
	
}