<?php
class post {
    static $post_count = 0;

    private $title;
    private $id;
    private $author;
    private $post_date;
    private $edit_date;
    private $content;
    private $hash;

    public function __construct($title, $author, $post_date, $content) {
        $this->title = $title;
        $this->id = post::get_new_id();
        $this->author = $author;
        $this->post_date = $post_date;
        $this->content = $content;
        $this->hash = hash('crc32', $title.$post_date.$time.$gmt);
        $this->edit_date = NULL;
    }

    static function get_new_id() {
        post::$post_count++;
        return post::$post_count;
    }

    static function get_post_count() {
        return post::$post_count;
    }

    public function print_post() {
        echo $this->title;
        echo $this->id;
        echo $this->author;
        echo $this->content;
    }

    public function get_id() {
        return $this->id;
    }
}

class image_post extends post {
    private $img_url;

    public function __construct($title, $author, $post_date, $content, $img_url) {
        $this->title = $title;
        $this->id = post::get_new_id();
        $this->author = $author;
        $this->post_date = $post_date;
        $this->content = $content;
        $this->hash = hash('crc32', $title.$post_date.$gmt);
        $this->edit_date = NULL;
        $this->img_url = $img_url;
    }
}

?>
