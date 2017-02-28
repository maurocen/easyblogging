<?php
	function salt($quantity) {
		$characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_=+/?.,!#$%^&*()';
		$charlength = strlen($characters);
		$rstring = '';
		for ($i=0; $i<$quantity ; $i++) {
			$randomString .= $characters[rand(0, $charlength - 1)];
		}
		return $randomString;
	}

	// Pretty self-explanatory.
?>
