<?php 
/**
 * The filter manager class sits inside the application, 
 * outside the lib folder, beause it would likely be modified 
 * for each individual application depending on what custom 
 * filters would be used.
 * 
 * uses the decorator / filter chain patterns.
 * 
 * @package app/filters
 */
class FilterManager {
	
	/**
	 * apply filters before calling the model method
	 * @param AbstractRequest $request
	 */
	public static function applyPreFilters(AbstractRequest &$request) {
		new CookiesFilter($request, 
			new SessionFilter($request, 
				new RequestRoutingFilter($request, 
					new SetRendererFilter($request)
				)
			)
		);
	}
	/**
	 * apply filters for after the model method has executed.
	 * @param AbstractRequest $request
	 */
	public static function applyPostFilters(AbstractRequest &$request) {
		new RenderFilter($request);
	}
	
}