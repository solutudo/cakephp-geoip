<?php
/**
 * GeoipComponentTestCase for CakePHP 1.2.x.x (geoip.test.php).
 *
 * Copyright (C) Wayne Khan 2010
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA
 */
class GeoipComponentTestCase extends CakeTestCase {
	function start() {
		App::import("component", "Geoip");
		
		$controller = new Controller(); // fake controller
		$this->GeoipComponentTest = new GeoipComponent();
		$this->GeoipComponentTest->initialize(&$controller);
	}
	
	function testGeoipComponent() {
		$tests = array(
			// Google DNS
			
			array(
				"address" => "8.8.8.8",
				"country_code" => "US",
				"country_name" => "United States"
			),
			
			array(
				"address" => "8.8.4.4",
				"country_code" => "US",
				"country_name" => "United States"
			),
			
			// Singtel DNS
			
			array(
				"address" => "165.21.83.88",
				"country_code" => "SG",
				"country_name" => "Singapore"
			),
			
			array(
				"address" => "165.21.100.88",
				"country_code" => "SG",
				"country_name" => "Singapore"
			)
		);
		
		for ($i=0, $max=sizeof($tests); $i<$max; $i++) {
			// 2 per, since GeoipComponent has only 2 public methods
			
			$result = $this->GeoipComponentTest->countryCode($tests[$i]["address"]);
			$this->assertEqual($result, $tests[$i]["country_code"]);
			
			$result = $this->GeoipComponentTest->countryName($tests[$i]["address"]);
			$this->assertEqual($result, $tests[$i]["country_name"]);
		}
	}
}
?>