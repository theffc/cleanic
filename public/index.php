<?php

	function redirectTo($url) {
		header("Location: $url");
	}

	function getHost() {
		return $_SERVER['HTTP_HOST'];
	}

	function getProtocol() {
		if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
			$protocol = 'https://';
		} else {
			$protocol = 'http://';
		}
		return $protocol;
	}

	function main() {
		$redirectUrl = getProtocol() . getHost() . "/cleanic/public/home/";
		redirectTo($redirectUrl);
	}

	main();
?>