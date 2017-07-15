<?php

class blog {
  private static instance;
  private $name;
  // private $motto;
  private $language;
  private $date_format;
  private $timezone;

  private function __construct($name, /*$motto,*/ $language, $date_format, $timezone) {
    $this->name = $name;
    // $this->motto = $motto;
    $this->language = $language;
    $this->date_format = $date_format;
    $this->timezone = $timezone;
  }

  public function getInstance() {
    if (!isset(self::$instance)) {
        self::$instance = new blog;
        touch('../data/blog.json');
        try {
            if (filesize("../data/blog.json") != 0) {
              self::$instance = unserialize(file_get_contents("../data/blog.json"));
            }
        }
        catch(Exception $e) {
            throw new Exception($e);
        }
    }
    return self::$instance;
  }

  public function getName() {
    return $this->name;
  }

  /* public function getMotto() {
      return $this->motto;
    }
  */

  public function getLanguage() {
    return $this->language;
  }

  public function getDate_format() {
    return $this->date_format;
  }

  public function getTimezone() {
    return $this->timezone;
  }

  public function setName($name) {
    $this->name = $name;
  }

  /* public function setMotto() {
      $this->motto;
    }
  */

  public function setLanguage($language) {
    $this->language = $language;
  }

  public function setDate_format($date_format) {
    $this->date_format = $date_format;
  }

  public function setTimezone($timezone) {
    $this->timezone = $timezone;
  }

}

?>
