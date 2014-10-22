<?php
	class Config {
		public static $contactFormId = 1;
		public static $metas = array(
				'box' => array('standard', 'description', 'image', 'group'),
				'color' => array('orange', 'purple', 'pink', 'lblue', 'red', 'yellow', 'blue', 'green')
		);
	}

	if ($_SERVER['SERVER_NAME'] == 'biuro.lo' || $_SERVER['SERVER_ADDR'] == '127.0.0.1') {
		Config::$contactFormId = 2;
	}
?>