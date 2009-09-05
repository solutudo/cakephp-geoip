<?php
class GeoipTestsController extends AppController {

	var $components = array("Geoip");
	var $uses = array();

	function countryCode($ip_address = null)
	{
		pr($this->Geoip->countryCode($ip_address));
		exit;
	}

	function countryName($ip_address = null)
	{
		pr($this->Geoip->countryCode($ip_address));
		exit;
	}
}
?>