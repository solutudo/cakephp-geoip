<?php
App::uses('Controller', 'Controller');
App::uses('CakeRequest', 'Network');
App::uses('CakeResponse', 'Network');
App::uses('ComponentCollection', 'Controller');

App::uses('GeoIpComponent', 'GeoIp.Controller/Component');

class GeoIpComponentTest extends CakeTestCase {

	public $GeoIpComponent = null;

	public function setUp() {
		parent::setUp();
		// Setup our component and fake test controller
		$Collection = new ComponentCollection();
		$this->GeoIpComponent = new GeoIpComponent($Collection);
		$CakeRequest = new CakeRequest();
		$CakeResponse = new CakeResponse();
		$this->Controller = new Controller($CakeRequest, $CakeResponse);
		$this->GeoIpComponent->startup($this->Controller);
	}

	public function testGeoIpComponentCountry() {

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

		for ($i = 0, $max = sizeof($tests); $i < $max; $i++) {
			$result = $this->GeoIpComponent->getCountryCode($tests[$i]['address']);
			$this->assertEqual($result, $tests[$i]['country_code']);
			$result = $this->GeoIpComponent->getCountryName($tests[$i]['address']);
			$this->assertEqual($result, $tests[$i]['country_name']);
		}

	}

	public function testGeoIpComponentCity() {
		$record = $this->GeoIpComponent->getRecord('201.42.156.183');
		$result = $this->GeoIpComponent->getRecordRegionName($record);
		debug("{$record->city}, {$result}");
	}
	
}
