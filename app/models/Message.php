<?php
class Message {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function findAllMessages($id_conversation) {
        $this->db->query('SELECT message.id, utilisateurs.role as role, login, avatar, texte, publication, id_utilisateur, id_conversation, liked, disliked, visible, signalement FROM message JOIN utilisateurs ON utilisateurs.id=message.id_utilisateur WHERE id_conversation= :id_conversation ORDER BY publication ASC');
        //Bind
        $this->db->bind(':id_conversation', $id_conversation);
        $results = $this->db->resultSet();

        return $results;
    }

    public function addMessage($data) {
        
        $this->db->query('INSERT INTO message (texte, publication, id_utilisateur, id_conversation, liked, disliked, visible, signalement)
         VALUES(:texte, :publication, :id_utilisateur, :id_conversation, :liked, :disliked, :visible, :signalement)');


        //Bind values
       
        $this->db->bind(':texte', $data['texte']);
        $this->db->bind(':publication', $data['publication']);
        $this->db->bind(':id_utilisateur', $data['id_utilisateur']);
        $this->db->bind(':id_conversation', $data['id_conversation']);
        $this->db->bind(':liked', $data['liked']);
        $this->db->bind(':disliked', $data['disliked']);
        $this->db->bind(':visible', $data['visible']);
        $this->db->bind(':signalement', $data['signalement']);


        
        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function viewMessage($id) {
        $this->db->query('SELECT * FROM message WHERE id = :id');

        //Bind 
        $this->db->bind(':id', $id);
        //méthode row comme objet de database
        $message = $this->db->single();
        return $message;
    }

    public function modifyMessage($data) {
        
        $this->db->query('UPDATE message SET texte= :texte, publication= :publication, id_utilisateur= :id_utilisateur,
         id_conversation= :id_conversation, liked= :liked, disliked= :disliked, visible= :visible, signalement= :signalement WHERE id=:id');


        //Bind values
       
        $this->db->bind(':texte', $data['texte']);
        $this->db->bind(':publication', $data['publication']);
        $this->db->bind(':id_utilisateur', $data['id_utilisateur']);
        $this->db->bind(':id_conversation', $data['id_conversation']);
        $this->db->bind(':liked', $data['liked']);
        $this->db->bind(':disliked', $data['disliked']);
        $this->db->bind(':visible', $data['visible']);
        $this->db->bind(':signalement', $data['signalement']);
        $this->db->bind(':id', $data['id']);
        
        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function modifyLiked($data){
        $this->db->query('UPDATE message SET liked= :liked WHERE id= :id' );
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
        $this->db->query('UPDATE message SET disliked= :disliked WHERE id= :id' );
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':disliked', $data['disliked']);
        
        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function modifySignalMessage($data){
        $this->db->query('UPDATE message SET signalement= :signalement WHERE id= :id' );
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':signalement', $data['signalement']);
        
        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function findAllConnected() {
        //Prepared statement
        $this->db->query('SELECT * FROM connected ');
        $results = $this->db->resultSet();

        return $results;
    }

    public function countMessage(){
        $this->db->query('SELECT id_conversation, COUNT(id_conversation) AS freq FROM message GROUP BY id_conversation');
        $results = $this->db->resultSet();

        return $results;
    }
}