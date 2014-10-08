<?php
	$__metaMap = array(
		'box' => array('standard', 'description', 'image', 'group'),
		'color' => array('orange', 'purple', 'pink', 'lblue', 'red', 'yellow', 'blue', 'green'),
		'size' => array('col-md-5' => '20%', 'col-md-4' => '25%', 'col-md-3' => '33%'),
	);

	function __ensureValidMeta($pageId, $meta) {
		global $__metaMap;
		if (!array_key_exists($meta, $__metaMap)) {
			return;
		}
		$value = strtolower(get_post_meta($pageId, $meta, true));
		return in_array($value, $__metaMap[$meta]) ? $value : $__metaMap[$meta][0];
	}

	function ensureBoxType($pageId) {
		return __ensureValidMeta($pageId, 'box');
	}

	function ensureColor($pageId) {
		return __ensureValidMeta($pageId, 'color');
	}

	function ensureSizeStyle($pageId) {
		global $__metaMap;
		$size = __ensureValidMeta($pageId, 'size');
		return array_keys($__metaMap['size'])[0];
	}

	function ensureUrl($pageId) {
		$url = strtolower(get_post_meta($pageId, 'url', true));
		return $url;
	}

?>