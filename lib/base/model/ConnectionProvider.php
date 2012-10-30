<?php
/**
 * The connection provider, also a singleton
 * 
 * @package lib/base/model
 */
class ConnectionProvider {
	
	/**
	 * static instance
	 * 
	 * @var ConnectionProvider
	 */
	private static $_instance = null;
	
	/**
	 * private constructor
	 */
	private function __construct() {
	}
	
	/**
	 * implemented magic clone
	 * 
	 * @throws Exception
	 */
	public function __clone() {
		throw new Exception("can not clone the singleton");
	}
	
	/**
	 * instance accessor
	 * 
	 * @return ConnectionProvider
	 */
	public static function getInstance() {
		if (!self::$_instance) {
			self::$_instance = new ConnectionProvider();
		}
		return self::$_instance;
	}

	/**
	 * return the connection as laid out in configuration.xml
	 * 
	 * @param string $role
	 * @return DataAccessInterface
	 */
	public function getConnection($role = DatabaseTypeEnum::MASTER) {
		
		$database = Configuration::getInstance()->environment->xpath("database[@role='$role']");
		
		$class = (string) $database[0]->attributes()->class;
		$host = (string) $database[0]->attributes()->host;
		$name = (string) $database[0]->attributes()->name;
		$user = (string) $database[0]->attributes()->user;
		$pass = (string) $database[0]->attributes()->pass;
		
		return new $class($host, $user, $pass, $name);
	}
}