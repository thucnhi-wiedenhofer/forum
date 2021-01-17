<?php
class Conversation {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function findAllConversations($id_topic) {
        $this->db->query('SELECT conversation.id as id, utilisateurs.role as role, login, avatar, titre, texte, publication, id_utilisateur, id_topic, liked, disliked, ouvert, visible FROM conversation JOIN utilisateurs ON utilisateurs.id=conversation.id_utilisateur WHERE id_topic= :id_topic ORDER BY publication ASC');
        //Bind
        $this->db->bind(':id_topic', $id_topic);
        $results = $this->db->resultSet();

        return $results;
    }

    public function addConversation($data) {
        
        $this->db->query('INSERT INTO conversation (titre, texte, publication, id_utilisateur, id_topic, ouvert, visible)
         VALUES(:titre, :texte, :publication, :id_utilisateur, :id_topic, :ouvert, :visible)');


        //Bind values
        $this->db->bind(':titre', $data['titre']);
        $this->db->bind(':texte', $data['texte']);
        $this->db->bind(':publication', $data['publication']);
        $this->db->bind(':id_utilisateur', $data['id_utilisateur']);
        $this->db->bind(':id_topic', $data['id_topic']);
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
         id_topic= :id_topic, ouvert= :ouvert, visible= :visible WHERE id=:id');


        //Bind values
        $this->db->bind(':titre', $data['titre']);
        $this->db->bind(':texte', $data['texte']);
        $this->db->bind(':publication', $data['publication']);
        $this->db->bind(':id_utilisateur', $data['id_utilisateur']);
        $this->db->bind(':id_topic', $data['id_topic']);
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

    public function verifyLiked($id, $id_utilisateur){
        $this->db->query('SELECT * FROM likedconversation WHERE id_conversation= :id_conversation AND id_utilisateur= :id_utilisateur');
        $this->db->bind(':id_conversation', $id);
        $this->db->bind(':id_utilisateur', $id_utilisateur);
       
        $row = $this->db->single();
       return $row;
    }

    public function createLiked($id, $id_utilisateur){
        $this->db->query('INSERT INTO likedconversation (liked, id_conversation, id_utilisateur)
        VALUES(:liked, :id_conversation, :id_utilisateur)');
        $this->db->bind(':liked', 1);
        $this->db->bind(':id_conversation', $id);
        $this->db->bind(':id_utilisateur', $id_utilisateur);
       
        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function createDisliked($id, $id_utilisateur){
        $this->db->query('INSERT INTO likedconversation (disliked, id_conversation, id_utilisateur)
        VALUES(:disliked, :id_conversation, :id_utilisateur)');
         $this->db->bind(':disliked', 1);
        $this->db->bind(':id_conversation', $id);
        $this->db->bind(':id_utilisateur', $id_utilisateur);
       
        
        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function countLike(){
        $this->db->query('SELECT id_conversation, COUNT(liked) AS liked, COUNT(disliked) AS disliked FROM likedconversation GROUP BY id_conversation');
       
        $results = $this->db->resultSet();

        return $results;
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