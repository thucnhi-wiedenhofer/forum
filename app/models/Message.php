<?php
class Message {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function findAllMessages($id_conversation) {
        $this->db->query('SELECT message.id, utilisateurs.role as role, login, avatar, texte, publication, id_utilisateur, id_conversation, visible, signalement FROM message JOIN utilisateurs ON utilisateurs.id=message.id_utilisateur WHERE id_conversation= :id_conversation ORDER BY publication ASC');
        //Bind
        $this->db->bind(':id_conversation', $id_conversation);
        $results = $this->db->resultSet();

        return $results;
    }

    public function addMessage($data) {
        
        $this->db->query('INSERT INTO message (texte, publication, id_utilisateur, id_conversation, visible, signalement)
         VALUES(:texte, :publication, :id_utilisateur, :id_conversation, :visible, :signalement)');


        //Bind values
       
        $this->db->bind(':texte', $data['texte']);
        $this->db->bind(':publication', $data['publication']);
        $this->db->bind(':id_utilisateur', $data['id_utilisateur']);
        $this->db->bind(':id_conversation', $data['id_conversation']);
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
         id_conversation= :id_conversation, visible= :visible, signalement= :signalement WHERE id=:id');


        //Bind values
       
        $this->db->bind(':texte', $data['texte']);
        $this->db->bind(':publication', $data['publication']);
        $this->db->bind(':id_utilisateur', $data['id_utilisateur']);
        $this->db->bind(':id_conversation', $data['id_conversation']);
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

    public function verifyLiked($id, $id_utilisateur){
        $this->db->query('SELECT * FROM likedmessage WHERE id_message= :id_message AND id_utilisateur= :id_utilisateur');
        $this->db->bind(':id_message', $id);
        $this->db->bind(':id_utilisateur', $id_utilisateur);
       
        $row = $this->db->single();
       return $row;
    }

    public function createLiked($id, $id_utilisateur){
        $this->db->query('INSERT INTO likedmessage (liked, id_message, id_utilisateur)
        VALUES(:liked, :id_message, :id_utilisateur)');
        $this->db->bind(':liked', 1);
        $this->db->bind(':id_message', $id);
        $this->db->bind(':id_utilisateur', $id_utilisateur);
       
        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function createDisliked($id, $id_utilisateur){
        $this->db->query('INSERT INTO likedmessage (disliked, id_message, id_utilisateur)
        VALUES(:disliked, :id_message, :id_utilisateur)');
        $this->db->bind(':disliked', 1);
        $this->db->bind(':id_message', $id);
        $this->db->bind(':id_utilisateur', $id_utilisateur);
       
        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function countLike(){
        $this->db->query('SELECT id_message, COUNT(liked) AS liked, COUNT(disliked) AS disliked FROM likedmessage GROUP BY id_message');
       
        $results = $this->db->resultSet();

        return $results;
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