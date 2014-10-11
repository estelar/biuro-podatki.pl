<?php

	class Utils {

		private static $__metaMap = array(
				'box' => array('standard', 'description', 'image', 'group'),
				'color' => array('orange', 'purple', 'pink', 'lblue', 'red', 'yellow', 'blue', 'green'),
				'size' => array('col-md-5' => '20%', 'col-md-4' => '25%', 'col-md-3' => '33%'),
		);

		public static function getChildPages($pageId, $limit = '') {
			return get_pages(array(
					'parent' => $pageId,
					'sort_column' => 'menu_order',
					'number' => $limit
			));
		}

		public static function getPageByToken($token) {
			$tokenArgs = array(
					'meta_key'   => 'token',
					'meta_value' => $token
			);
			$tokenPages = get_pages($tokenArgs);
			return count($tokenPages) > 0 ? $tokenPages[0] : null;
		}

		public static function getPageIdByToken($token) {
			$page = Utils::getPageIdByToken($token);
			return is_object($page) ? $page->ID : null;
		}

		public static function getPageContentByToken($token) {
			$page = Utils::getPageIdByToken($token);
			return is_object($page) ? $page->post_content : null;
		}

		public static function getMeta($pageId, $name) {
			$meta = get_post_meta($pageId, $name, true);
			return $meta !== '' ? $meta : null;
		}

		public static function formatContent($content) {
			return apply_filters('the_content', $content);
		}

		public static function getRandomColor() {
			$cnt = count(Utils::$__metaMap['color']);
			$idx = rand(1, $cnt);
			return Utils::$__metaMap['color'][$idx-1];
		}

		public static function ensureBoxType($pageId) {
			return Utils::__ensureValidMeta($pageId, 'box');
		}

		public static function ensureColor($pageId) {
			return Utils::__ensureValidMeta($pageId, 'color');
		}

		public static function ensureColorRandomly($pageId) {
			$color = Utils::getMeta($pageId, 'color');
			return $color != null ? $color : Utils::getRandomColor();
		}

		public static function ensureSizeStyle($pageId) {
			$size = Utils::__ensureValidMeta($pageId, 'size');
			return array_keys(Utils::$__metaMap['size'])[0];
		}

		public static function ensureUrl($pageId) {
			$url = strtolower(Utils::getMeta($pageId, 'url'));
			return $url;
		}

		private static function __ensureValidMeta($pageId, $meta) {
			if (!array_key_exists($meta, Utils::$__metaMap)) {
				return;
			}
			$value = strtolower(Utils::getMeta($pageId, $meta));
			return in_array($value, Utils::$__metaMap[$meta]) ? $value : Utils::$__metaMap[$meta][0];
		}

	}

	function flatmania_setup() {
		load_theme_textdomain('flatmania', get_template_directory() . '/languages');
	}

	add_action('after_setup_theme', 'flatmania_setup');
?>