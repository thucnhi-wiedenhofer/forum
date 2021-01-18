<?php
class Intranet {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function crud() {
        $this->db->query('SELECT * FROM mail_intranet ORDER BY envoi ASC');
        $results = $this->db->resultSet();

        return $results;
    }

    public function receipt($id_user) {
        $this->db->query('SELECT `id_mail`, `objet`, `texte`, `id_expediteur`, `id_destinataire`, `envoi`, `signalement`, login FROM mail_intranet JOIN utilisateurs ON utilisateurs.id = mail_intranet.id_expediteur WHERE id_destinataire = :id_user ORDER BY envoi ASC');
        //Bind
        $this->db->bind(':id_user', $id_user);
        $results = $this->db->resultSet();

        return $results;
    }

    public function sent($id_user) {
        $this->db->query('SELECT `id_mail`, `objet`, `texte`, `id_expediteur`, `id_destinataire`, `envoi`, `signalement`, login FROM mail_intranet JOIN utilisateurs ON utilisateurs.id = mail_intranet.id_destinataire WHERE id_expediteur = :id_user ORDER BY envoi ASC');
        //Bind
        $this->db->bind(':id_user', $id_user);
        $results = $this->db->resultSet();

        return $results;
    }

    public function create($data) {
        
        $this->db->query('INSERT INTO mail_intranet (objet, texte, id_expediteur, id_destinataire, envoi, signalement)
         VALUES(:objet, :texte, :id_expediteur, :id_destinataire, :envoi, :signalement)');


        //Bind values
        $this->db->bind(':objet', $data['objet']);
        $this->db->bind(':texte', $data['texte']);
        $this->db->bind(':id_expediteur', $data['id_expediteur']);
        $this->db->bind(':id_destinataire', $data['id_destinataire']);
        $this->db->bind(':envoi', $data['envoi']);
        $this->db->bind(':signalement', $data['signalement']);
               
        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function view($id) {
        $this->db->query('SELECT `id_mail`, `objet`, `texte`, `id_expediteur`, `id_destinataire`, `envoi`, `signalement`, login, role FROM mail_intranet JOIN utilisateurs ON utilisateurs.id = mail_intranet.id_expediteur WHERE id_mail = :id_mail');

        //Bind 
        $this->db->bind(':id_mail', $id);
        //méthode row comme objet de database
        $mail = $this->db->single();
        return $mail;
    }

    public function signalement($id) {
        
            $this->db->query('UPDATE mail_intranet SET signalement= :signalement WHERE id_mail= :id_mail' );
            $this->db->bind(':id_mail', $id);
            $this->db->bind(':signalement', 1);
            
            //Execute function
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

    public function delete($mail){
    
        $this->db->query('DELETE FROM mail_intranet WHERE id_mail = :id_mail');
        $this->db->bind('id_mail', $mail);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }
       

}