<?php

function my_autoload($className) {
	$fn = __DIR__ . '/' . str_replace('_','/',$className) . '.php';
	if(file_exists($fn)) {
		require $fn;
	} else {
		$fn = __DIR__ . '/../vendor/lib/' . str_replace('_','/',$className) . '.php';
		if(file_exists($fn)) {
			require $fn;
		}
	}
}

spl_autoload_register('my_autoload');
function rdir() {
	return realpath(__DIR__ . '/../');
}
function sdown() {
	$len = ob_get_length();
	header("Content-Length: $len");
	ob_end_flush();
	flush();
}
function prep_sdown() {
	error_reporting(E_ALL);
	ini_set('display_errors',true);
	if(isset($_SERVER['GATEWAY_INTERFACE']) && ($_SERVER['GATEWAY_INTERFACE'] == 'CGI/1.1')) {
		ob_start();
		register_shutdown_function('sdown');
	}
}

prep_sdown();