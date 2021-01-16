<?php
class Post {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }
    
    public function countConnected(){
        $this->db->query('SELECT COUNT(id) as count FROM `connected`');
        $countConnected =  $this->db->single();
        return $countConnected;
    }
}