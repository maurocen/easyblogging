<?php
	function salt() {
		$characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_=+/?.,!#$%^&*()';
		$charlength = strlen($characters);
		$rstring = '';
		for ($i=0; $i<32 ; $i++) { 
			$randomString .= $characters[rand(0, $charlength - 1)];
		}
		return $randomString;
	}
?>