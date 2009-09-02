<?php
class GeoIPComponent extends Object {

	var $controller = null; // controller reference

	function initialize(&$controller, $settings = array())
	{
		$this->controller =& $controller;
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
}
?>