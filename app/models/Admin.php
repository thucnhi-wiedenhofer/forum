<?php
class User {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function profil($data){
            
            $this->db->query('UPDATE utilisateurs SET login= :login, password= :password, email= :email WHERE id= :id');
            $this->db->bind(':login', $data['login']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':id', $data['id']);
            
           
            //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }         
    }  
    
    public function inscription($data) {
        $creation= date("Y-m-d");
        $intranet= $data['login'].'@intranet';
        $this->db->query('INSERT INTO utilisateurs (login, password, email, intranet, avatar, 
         creation, role) VALUES(:login, :password, :email, :intranet,:avatar,:creation,:role)');


        //Bind values
        $this->db->bind(':login', $data['login']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':intranet', $intranet);
        $this->db->bind(':avatar', $data['avatar']);        
        $this->db->bind(':creation', $creation);        
        $this->db->bind(':role', $data['role']);
       
        
        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function connexion($login, $password) {
        $this->db->query('SELECT * FROM utilisateurs WHERE login = :login AND role = :role');

        //Bind 
        $this->db->bind(':login', $login);
        $this->db->bind(':role', 'admin');
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
    public function findAdminByLogin($login) {
        $this->db->query('SELECT * FROM utilisateurs WHERE login = :login');

        //Bind 
        $this->db->bind(':login', $login);
        //méthode row comme objet de database
        $row = $this->db->single();
        return $row;
    }

    //Find user by email. Email is passed in by the Controller.
    public function findAdminByEmail($email) {
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