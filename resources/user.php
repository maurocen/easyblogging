<?php

include_once('salt.php');

class user {
    private $name;
    private $hashed_pass;
    private $salt;

    public function __construct($name, $pass) {
        $this->name = $name;
        $this->salt = salt(128);
        $this->hashed_pass = hash("sha512", $this->salt.$pass);
    }

    public function getName() {
        return $this->name;
    }

    public function getHashed_pass() {
        return $this->hashed_pass;
    }

    public function getSalt() {
        return $this->salt;
    }
}

?>
