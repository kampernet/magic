<?php
/**
 * The Filter Chain Interface 
 * which the Base Filter implements
 * 
 * @package lib/base/filters
 */
interface FilterChainInterface {
	public function __construct(AbstractRequest &$request, FilterChainInterface $filter = null);
	/**
	 * do whatever processing you need 
	 * referencing the request variable 
	 * of the filter.
	 * 
	 * @return void
	 */
	public function applyFilter();
}