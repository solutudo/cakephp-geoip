<?php
class GeoIpRegions {
	
	public $regions = null;
	
	public function __construct() {
		include('maxmind/geoipregionvars.php');
		$this->regions = $GEOIP_REGION_NAME;
	}
	
}
