<?php
/**
 * this is a class to represent the environment.
 * it also wraps all "constants" defined in the 
 * configuration.xml
 * 
 * @package lib/base
 */
class Environment {
	
	/**
	 * @var Environment
	 */
	private static $_instance = null;
	
	/**
	 * private constructor
	 */
	private function __construct() {}
	
	/**
	 * no clones
	 * @throws Exception
	 */
	public function __clone() {
		throw new Exception("can not clone the singleton");
	}
	
	/**
	 * singleton access
	 * @return Environment
	 */
	public static function getInstance() {
		if (!self::$_instance) {
			self::$_instance = new Environment();
		}
		return self::$_instance;
	}	
	
	/**
	 * @return string
	 */
	public static function getEnvironment() { 
		
		$env = Configuration::getInstance()->constants->xpath("constant[@name='environment']");
		return (string) $env[0]->attributes()->value;
	}

	/**
	 * magic get impl for constants
	 * @param string $name
	 */
	public function __get($name) {
		$const = Configuration::getInstance()->constants->xpath("constant[@name='$name']");
		return (!empty($const))? (string) $const[0]->attributes()->value : null;
	}
}