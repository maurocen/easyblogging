<?php

class user_db {
    private static $instance;
    private $users;
    private $role;

    public function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new user_db;
            touch('../data/users.json');
            try {
                if (filesize("../data/users.json") != 0) {
                  self::$instance = unserialize(file_get_contents("../data/users.json"));
                }
            }
            catch(Exception $e) {
                throw new Exception($e);
            }
        }
        return self::$instance;
    }

    public function add_user($user, $role) {
        if (isset($this->users[$user->getName()])) {
            throw new Exception('User already exists.');
        }
        else {
            $this->users[$user->getName()] = $user;
            $this->role[$user->getName()] = $role;
            $file = fopen('../data/users.json', 'w+');
            $data = serialize(self::$instance);
            fwrite($file, $data);
        }
    }

    public function getUsers() {
        return $this->users;
    }

    public function getUser_by_name($user) {
        if (!isset($this->users[$user])) {
            throw new Exception('User does not exist.');
        }

        return $this->users[$user];
    }

    public function getUser_role($user) {
      if (!isset($this->users[$user])) {
        throw new Exception('User does not exist.');
      }

      return $this->role[$user];
    }

    public function setUser_role($user, $role) {
      if (!isset($this->users[$user])) {
        throw new Exception('User does not exist.');
      }

      $this->role[$user] = $role;
    }

    public function validate($user, $pass) {
        try {
            $cmp = $this->getUser_by_name($user);
            $hashed_pass = $cmp->getHashed_pass();
            $salt = $cmp->getSalt();
            $hashed_result = hash("sha512", $salt.$pass);
            return ($hashed_result == $hashed_pass);
        }
        catch (Exception $e) {
            throw new Exception('Error when validating user: '.$e->getMessage());
        }
    }
}

?>
