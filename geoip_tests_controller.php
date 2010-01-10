<?php
class GeoipTestsController extends AppController {
	var $autoRender = false;
	var $components = array("Geoip");
	var $layout = false;
	var $uses = array();

	function index($ipAddress = null) {
		if (is_null($ipAddress)) {
			$ipAddress = "8.8.8.8"; // Google DNS
		}
		
		$countryCode = $this->Geoip->countryCode($ipAddress);
		$countryName = $this->Geoip->countryName($ipAddress);
		print sprintf("%s, %s", $countryCode, $countryName);
	}
}
?>
