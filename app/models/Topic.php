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

    public function addTopic($data) {
        
        $this->db->query('INSERT INTO topic (titre, id_utilisateur, date_publication, droits)
         VALUES(:titre, :id_utilisateur, :date_publication, :droits)');


        //Bind values
        $this->db->bind(':titre', $data['titre']);
        $this->db->bind(':id_utilisateur', $data['id_utilisateur']);
        $this->db->bind(':date_publication', $data['date_publication']);
        $this->db->bind(':droits', $data['droits']);
        
        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

}