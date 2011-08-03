<?php
/**
 * GeoipComponent for CakePHP 1.x.
 *
 * @file ./app/tests/cases/geoip.test.php
 */
class GeoipComponentTestCase extends CakeTestCase {
	function start() {
		App::import('component', 'Geoip');
		$controller = new Controller(); // fake controller
		$this->GeoipComponentTest = new GeoipComponent();
		$this->GeoipComponentTest->initialize(&$controller);
	}
	
	function testGeoipComponent() {
		$tests = array(
			array(
				'address' => '8.8.8.8',
				'country_code' => 'US',
				'country_name' => 'United States',
			),
			array(
				'address' => '8.8.4.4',
				'country_code' => 'US',
				'country_name' => 'United States',
			),
			array(
				'address' => '165.21.83.88',
				'country_code' => 'SG',
				'country_name' => 'Singapore',
			),
			array(
				'address' => '165.21.100.88',
				'country_code' => 'SG',
				'country_name' => 'Singapore',
			),
		);
		
		for ($i=0,$max=sizeof($tests); $i<$max; $i++) {
			// 2 per, since GeoipComponent has only 2 public methods
			
			$result = $this->GeoipComponentTest->countryCode($tests[$i]['address']);
			$this->assertEqual($result, $tests[$i]['country_code']);
			
			$result = $this->GeoipComponentTest->countryName($tests[$i]['address']);
			$this->assertEqual($result, $tests[$i]['country_name']);
		}
	}
}
