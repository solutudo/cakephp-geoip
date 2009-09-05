<?php
App::import("Vendor", "GeoIP", array("file" => "geoip.inc")); // app/vendors/geoip.inc
class GeoIPComponent extends Object {

	var $controller = null; // controller reference
	var $gi = null;

	// callbacks

	/**
	* Called before Controller::beforeFilter().
	*/
	function initialize(&$controller, $settings = array())
	{
		$this->controller =& $controller; // saving the controller reference for later use
		$this->gi = geoip_open(WWW_ROOT . "GeoIP.dat", GEOIP_STANDARD); // app/webroot/GeoIP.dat
	}

	/**
	* Called after Controller::beforeFilter().
	*/
	function startup(&$controller)
	{

	}

	/**
	* Called after Controller::beforeRender().
	*/
	function beforeRender(&$controller)
	{

	}

	/**
	* Called after Controller::render().
	*/
	function shutdown(&$controller)
	{

	}

	/**
	* Called before Controller::redirect().
	*/
	function beforeRedirect(&$controller, $url, $status = null, $exit = true)
	{

	}

	// methods

	function countryCode($address = null)
	{
		return geoip_country_code_by_addr($this->gi, $address);
	}

	function countryName($address = null)
	{
		return geoip_country_name_by_addr($this->gi, $address);
	}
}
?>