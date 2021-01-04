<?php
class Reservation{
    private $db;
    public function __construct(){
      $this->db = new Database;      
    }
    
    public function  enregistrerReserv($data){
        
        $this->db->query('INSERT INTO reservations (titre, description, debut, strt_debut, fin, id_utilisateur) VALUES(:titre, :description, :debut, :strt_debut, :fin, :id_utilisateur)');
       
        $this->db->bind(':titre', $data['titre']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':debut', $data['debut']);
        $this->db->bind(':strt_debut', $data['strt_debut']);
        $this->db->bind(':fin', $data['fin']);
        $this->db->bind(':id_utilisateur', $data['id_utilisateur']);
       
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }             
    }

    public function allReserv($data){
        $this->db->query('SELECT reservations.id, titre, description, debut, strt_debut, fin, id_utilisateur, login FROM reservations JOIN utilisateurs ON utilisateurs.id=reservations.id_utilisateur WHERE debut >= :monday AND debut <= :endweek');
        $this->db->bind(':monday', $data['monday']);
        $this->db->bind(':endweek', $data['endweek']);
        $results = $this->db->resultSet();
        return $results;
        
    }

    public function singleReserv($id){
        $this->db->query('SELECT * FROM reservations JOIN utilisateurs ON reservations.id_utilisateur=utilisateurs.id  WHERE reservations.id= :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }


    public function annuler($data){
        $this->db->query('DELETE FROM reservations WHERE id= :id');
        $this->db->bind(':id', $data['id']);
        $this->db->execute(); 
    }

    
}
