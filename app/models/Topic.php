<?php
class Topic {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function findAllTopics() {
        $this->db->query('SELECT * FROM topic JOIN utilisateurs ON `id_utilisateur`= utilisateurs.id ORDER BY date_publication ASC');

        $results = $this->db->resultSet();

        return $results;
    }

}