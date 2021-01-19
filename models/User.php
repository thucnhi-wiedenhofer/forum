<?php
class User {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function profil($data){
            
            $this->db->query('UPDATE utilisateurs SET login= :login, password= :password, avatar= :avatar WHERE id= :id');
            $this->db->bind(':login', $data['login']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':avatar', $data['avatar'] );
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
        $this->db->query('INSERT INTO utilisateurs (login, password, email, intranet, avatar, naissance,
         creation, genre, role, blocage, periode_blocage) VALUES(:login, :password, :email, :intranet,:avatar, :naissance, :creation, :genre, :role, :blocage, :periode_blocage)');


        //Bind values
        $this->db->bind(':login', $data['login']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':intranet', $intranet);
        $this->db->bind(':avatar', $data['avatar']);
        $this->db->bind(':naissance', $data['naissance']);
        $this->db->bind(':creation', $creation);
        $this->db->bind(':genre', $data['genre']);
        $this->db->bind(':role', $data['role']);
        $this->db->bind(':blocage', $data['blocage']);
        $this->db->bind(':periode_blocage', $data['periode_blocage']);
       
        
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

            if (password_verify($password, $hashedPassword) ) {
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

      public function view($id) {
        $this->db->query('SELECT * FROM utilisateurs WHERE id = :id');

        //Bind 
        $this->db->bind(':id', $id);
        //méthode row comme objet de database
        $user = $this->db->single();
        return $user;
    }

    public function connected($user){
        $this->db->query('INSERT INTO connected (id_utilisateur, str_connect) VALUES( :id_utilisateur, :str_connect)');
        $this->db->bind('id_utilisateur', $user->id);
        $this->db->bind('str_connect', strtotime("now") );
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }

    public function cleanConnected($strt){
        $this->db->query('DELETE FROM connected WHERE str_connect < :strt');
        $this->db->bind('strt', $strt);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
   

    public function disconnected($user){
        
        $this->db->query('DELETE FROM connected WHERE id_utilisateur = :id_utilisateur');
        $this->db->bind('id_utilisateur', $user);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }

   
}