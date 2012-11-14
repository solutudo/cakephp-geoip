<?php
App::import('Vendor', 'GeoIp.GeoIp', array('file' => 'maxmind' . DS . 'geoip.inc'));
App::import('Vendor', 'GeoIp.GeoIpCity', array('file' => 'maxmind' . DS . 'geoipcity.inc'));

App::import('Vendor', 'GeoIp.GeoIpRegions');

class GeoIpComponent extends Component {

	public $gi = null;

	public $gic = null;

	public $GeoIpRegions = null;

	public function __construct(ComponentCollection $collection, $settings = array()) {
		$libPath = dirname(dirname(dirname(__FILE__))) . DS . 'Lib' . DS ;

		$default = array(
			'lib' => $libPath,
			'geoipdat' => 'GeoIP.dat',
			'geocitydat' => 'GeoLiteCity.dat'
		);

		$settings = array_merge($default, $settings);

		if (empty($settings['geoipdat'])) {
			trigger_error(__('Invalid value for \'geoipdat\' setting.'), E_USER_WARNING);
			unset($settings['geoipdat']);
		} else {
			$this->gi = geoip_open("{$settings['lib']}{$settings['geoipdat']}", GEOIP_STANDARD);
		}

		if (empty($settings['geocitydat'])) {
			trigger_error(__('Invalid value for \'geocitydat\' setting.'), E_USER_WARNING);
			unset($settings['geocitydat']);
		} else {
			$this->gic = geoip_open("{$settings['lib']}{$settings['geocitydat']}", GEOIP_STANDARD);
		}

		$this->GeoIpRegions = new GeoIpRegions();

		parent::__construct($collection, $settings);
	}

	/**
	 * (non-PHPdoc)
	 * @see Component::shutdown()
	 */
	public function shutdown(Controller $controller) {

		if (!empty($this->$settings['geoipdat'])) {
			geoip_close($this->$settings['geoipdat']);
		}

		if (!empty($this->$settings['geocitydat'])) {
			geoip_close($this->$settings['geocitydat']);
		}

	}

	public function getCountryCode($address = null) {
		return geoip_country_code_by_addr($this->gi, $address);
	}

	public function getCountryName($address = null) {
		return geoip_country_name_by_addr($this->gi, $address);
	}

	public function getRecord($address = null) {
		return geoip_record_by_addr($this->gic, $address);
	}

	public function getRecordRegionName($record = null) {
		
		if (!is_object($record)) {
			$record = $this->getRecord($record);
		}

		if (!empty($record) && !empty($record->country_code)
				&& !empty($record->region)) {
			return $this->GeoIpRegions->regions[$record->country_code][$record->region];
		}

		return null;
	}

}
