<?php
class User {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function profil($data){
                                            
            $this->db->query('UPDATE utilisateurs SET password= :password, email= :email, 
            avatar= :avatar WHERE id= :id');
            
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':avatar', $data['avatar']);
            $this->db->bind(':id', $data['id']);
           
            //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }         
    }  
    
    public function inscription($data) {
       
        $this->db->query('INSERT INTO utilisateurs (login, password, email, intranet, avatar, naissance,
         creation, genre, role) VALUES(:login, :password, :email, :intranet,:avatar, :naissance, :creation, :genre, :role)');


        //Bind values
        $this->db->bind(':login', $data['login']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':intranet', $data['intranet']);
        $this->db->bind(':avatar', $data['avatar']);
        $this->db->bind(':naissance', $data['naissance']);
        $this->db->bind(':creation', $data['creation']);
        $this->db->bind(':genre', $data['genre']);
        $this->db->bind(':role', $data['role']);
       
        
        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function connexion($login, $password) {
        $this->db->query('SELECT * FROM utilisateurs WHERE login = :login');

        //Bind 
        $this->db->bind(':login', $login);
        //méthode row comme objet de database
        $row = $this->db->single();
        if($row != FALSE){
            $hashedPassword = $row->password;

            if (password_verify($password, $hashedPassword)) {
                return $row;
            } else {
                return false;
            }
        }else{return false;}
       
    }

    //méthode finduser par login. login est passée par le Controller.
    public function findUserByLogin($login) {
        $this->db->query('SELECT * FROM utilisateurs WHERE login = :login');

        //Bind 
        $this->db->bind(':login', $login);
        //méthode row comme objet de database
        $row = $this->db->single();
        return $row;
    }

    //Find user by email. Email is passed in by the Controller.
    public function findUserByEmail($email) {
        //Prepared statement
        $this->db->query('SELECT * FROM utilisateurs WHERE email = :email');

        //Email param will be binded with the email variable
        $this->db->bind(':email', $email);

        //Check if email is already registered
        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}