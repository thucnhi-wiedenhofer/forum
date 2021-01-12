<?php
class Conversation {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function findAllConversations($id_topic) {
        $this->db->query('SELECT * FROM conversation WHERE id_topic= :id_topic ORDER BY publication ASC');
        //Bind
        $this->db->bind(':id_topic', $id_topic);
        $results = $this->db->resultSet();

        return $results;
    }

    public function addConversation($data) {
        
        $this->db->query('INSERT INTO conversation (titre, texte, publication, id_utilisateur, id_topic, liked, disliked, ouvert, visible)
         VALUES(:titre, :texte, publication, :id_utilisateur, :id_topic, :liked, :disliked, :ouvert, :visible)');


        //Bind values
        $this->db->bind(':titre', $data['titre']);
        $this->db->bind(':texte', $data['texte']);
        $this->db->bind(':publication', $data['publication']);
        $this->db->bind(':id_utilisateur', $data['id_utilisateur']);
        $this->db->bind(':id_topic', $data['id_topic']);
        $this->db->bind(':liked', $data['liked']);
        $this->db->bind(':disliked', $data['disliked']);
        $this->db->bind(':ouvert', $data['ouvert']);
        $this->db->bind(':visible', $data['visible']);


        
        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function viewConversation($id) {
        $this->db->query('SELECT * FROM conversation WHERE id = :id');

        //Bind 
        $this->db->bind(':id', $id);
        //méthode row comme objet de database
        $conversation = $this->db->single();
        return $conversation;
    }

    public function modifyConversation($data) {
        
        $this->db->query('UPDATE conversation SET  titre= :titre, texte= :texte, publication= :publication, id_utilisateur= :id_utilisateur,
         id_topic= :id_topic, liked= :liked, disliked= :disliked, ouvert= :ouvert, visible= :visible WHERE id=:id');


        //Bind values
        $this->db->bind(':titre', $data['titre']);
        $this->db->bind(':texte', $data['texte']);
        $this->db->bind(':publication', $data['publication']);
        $this->db->bind(':id_utilisateur', $data['id_utilisateur']);
        $this->db->bind(':id_topic', $data['id_topic']);
        $this->db->bind(':liked', $data['liked']);
        $this->db->bind(':disliked', $data['disliked']);
        $this->db->bind(':ouvert', $data['ouvert']);
        $this->db->bind(':visible', $data['visible']);
        $this->db->bind(':id', $data['id']);
        
        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function modifyLiked($data){
        $this->db->query('UPDATE conversation SET liked= :liked WHERE id= :id' );
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':liked', $data['liked']);
        
        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function modifyDisliked($data){
        $this->db->query('UPDATE conversation SET disliked= :disliked WHERE id= :id' );
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':disliked', $data['disliked']);
        
        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

}