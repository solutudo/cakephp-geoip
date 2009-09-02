<?php
App::import("Vendor", "GeoIP", array("file" => "geoip.inc")); // app/vendors/geoip.inc
class GeoIPComponent extends Object {

	var $controller = null; // controller reference
	var $gi = null;

	// callbacks

	function initialize(&$controller, $settings = array())
	{
		$this->controller =& $controller;
		$this->gi = geoip_open(WWW_ROOT . "GeoIP.dat", GEOIP_STANDARD); // app/webroot/GeoIP.dat
	}

	function startup(&$controller)
	{

	}

	function beforeRender(&$controller)
	{

	}

	function shutdown(&$controller)
	{

	}

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