<?php

class InsertPost extends Config {
    
    public $username;
    public $post_content;
    public $post_url;

    public function __construct($username, $post_content, $post_url) {
        $this->username = $username;
        $this->post_content = $post_content;
        $this->post_url = $post_url;
    }

    public function insertPost() {
        $connect = $this->connect();
        $sql = "INSERT INTO post (username, post_content, post_url) VALUES (:username, :post_content, :post_url)";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':post_content', $this->post_content);
        $stmt->bindParam(':post_url', $this->post_url);
        $stmt->execute();
    }





}
?>