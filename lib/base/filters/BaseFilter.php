<?php
/**
 * The base filter class for the decorator filters
 * 
 * @package lib/base/filters
 */
abstract class BaseFilter implements FilterChainInterface {

	/**
	 * 
	 * @var AbstractRequest
	 */
	public $request;

	/**
	 * the constructor can take another filter in it's constructor
	 * thereby chaining the constructors to run their applyFilters
	 *
	 * @param \AbstractRequest|\Request $request
	 * @param FilterChainInterface $filter
	 * @return \BaseFilter
	 */
	public function __construct(AbstractRequest &$request, FilterChainInterface $filter = null) {
		$this->request = $request;
		$this->applyFilter();
	}

}