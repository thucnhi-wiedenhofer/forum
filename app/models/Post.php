<?php
class Post {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }
    
    public function countConnected(){
        $this->db->query('SELECT COUNT(id) FROM `connected`');
        $countConnected = $this->db->execute();
        return $countConnected;
    }
}