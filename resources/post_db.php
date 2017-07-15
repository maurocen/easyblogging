<?php

include_once('./post.php');

class Post_db {
    private static $instance;
    private $posts;

    public function add_post($post) {
        $this->posts[$post->get_id()] = $post;
    }

    public function remove_post($post) {
        try {
            unset($this->posts[$post]);
        }
        catch (Exception $e) {

        }
    }

    private function __construct() {
    }

    public function getPosts() {
        return $this->posts;
    }

    public function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new Post_db;
        }
        return self::$instance;
    }
}

?>
