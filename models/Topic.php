<?php
class Topic {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function findAllTopics() {
        $this->db->query('SELECT * FROM topic ORDER BY date_publication ASC');

        $results = $this->db->resultSet();

        return $results;
    }

    public function countConversation(){
        $this->db->query('SELECT id_topic, COUNT(id_topic) as freq  FROM conversation GROUP BY id_topic');
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

    public function viewTopic($id) {
        $this->db->query('SELECT * FROM topic WHERE id = :id');

        //Bind 
        $this->db->bind(':id', $id);
        //méthode row comme objet de database
        $topic = $this->db->single();
        return $topic;
    }

    public function modifyTopic($data) {
        
        $this->db->query('UPDATE topic SET  titre= :titre, id_utilisateur= :id_utilisateur, date_publication= :date_publication, droits= :droits WHERE id=:id');


        //Bind values
        $this->db->bind(':titre', $data['titre']);
        $this->db->bind(':id_utilisateur', $data['id_utilisateur']);
        $this->db->bind(':date_publication', $data['date_publication']);
        $this->db->bind(':droits', $data['droits']);
        $this->db->bind(':id', $data['id']);
        
        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

}