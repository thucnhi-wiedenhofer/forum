<?php
class Admins extends Controller {
    public function __construct() {
        $this->adminModel = $this->model('Admin');
    }


    public function connexion() {
        $data = [
            'title' => 'Login page',
            'loginError' => '',
            ];

        //validation des post
        if(isset($_POST['submit'])) {
            function valid_data($data){
                $data = trim($data);/*enlève les espaces en début et fin de chaîne*/
                $data = stripslashes($data);/*enlève les slashs dans les textes*/
                $data = htmlspecialchars($data);/*enlève les balises html comme ""<>...*/
                return $data;
            }
                /*on récupère les valeurs login ,password du formulaire et on y applique
                 les filtres de la fonction valid_data*/
                $login = valid_data($_POST["login"]);
                $password = $_POST["password"];
                

                $loggedInAdmin = $this->adminModel->connexion($login, $password);

                if ($loggedInAdmin != false) {
                    $this->createAdminSession($loggedInAdmin);
                } else {
                    $data['loginError'] = 'Soit le mot de passe ou le login sont incorrects, soit vous n\'avez pas les droits administrateur. ';

                    $this->view('admins/connexion', $data);
                }


        } else {
            $data = [
                'loginError' => ''
            ];
        }
        $this->view('admins/connexion', $data);
    }

    public function inscription() {
        $data = [
            'login' => '',
            'loginError' =>'',
            'password' => '',
            'confirmPassword' => '',
            'confirmPasswordError' => '',
            'email'=> '',
            'emailError'=> '',
            'intranet' =>'',
            'avatar'=> '',
            'creation'=> '',
            'role' => ''
            ];


        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['enregistrer'])){

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


            $data = [
                'login' => trim($_POST['login']),
                'loginError' =>'',
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'confirmPasswordError' => '',
                'email'=> trim($_POST["email"]),
                'emailError'=>'',
                'intranet'=>$_POST['login'].'@intranet',
                'avatar'=> trim($_POST["avatar"]),
                'creation'=> date('Y-m-d'),
                'role' => trim($_POST['role'])

            ];


                if ($data['password'] != $data['confirmPassword']) {
                    $data['confirmPasswordError'] = 'Les passwords ne correspondent pas.';
                
                }elseif
                    ($this->adminModel->findAdminByEmail($data['email'])) {
                        $data['emailError'] = 'Cet email est déja utilisé.';
                }elseif
                ($this->adminModel->findAdminByLogin($data['login'])) {
                    $data['loginError'] = 'Ce login est déja utilisé.';}


            // error vide
            if (empty($data['confirmPasswordError']) && empty($data['loginError']) && empty($data['emailError']) ) {

                // Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //enregistre utilisateur
                if ($this->adminModel->inscription($data)) {
                    //Redirect page connexion
                    header('location: ' . URLROOT . '/admins/connexion');
                } else {
                    die('Erreur systéme.');
                }
            }
        }

        $this->view('admins/inscriptionAdmin', $data);
    }

    public function profil() {
        $data = [
            'id'=> '',
            'login' => '',
            'password' => '',
            'confirmPassword' => '',
            'confirmPasswordError' => '',
            'email'=> '',
            'emailError'=> '',
            ];

        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['modifier'])){

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $_SESSION['id'],
                'login' => $_SESSION['login'],
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'confirmPasswordError' => '',                
                'email'=> trim($_POST["email"]),
                'emailError'=>'',
                ];

            if ($data['password'] != $data['confirmPassword']) {
                $data['confirmPasswordError'] = 'Les passwords ne correspondent pas.';
           
            }elseif
                ($_POST['email']!= $_SESSION['email'] && $this->adminModel->findAdminByEmail($data['email'])) {
                    $data['emailError'] = 'Cet email est déja utilisé.';
            }
        // error vide
        if (empty($data['confirmPasswordError']) && empty($data['emailError']) ) {

                // Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //enregistre utilisateur
                if ($this->adminModel->profil($data)) {
                    //Redirect page connexion
                    header('location: ' . URLROOT . '/admins/logout');
                } else {
                    die('Erreur système.');
                }
            }
        }
        $this->view('admins/profilAdmin', $data);
    }


    public function createAdminSession($admin) {
        $_SESSION['id'] = $admin->id;
        $_SESSION['login'] = $admin->login;
        $_SESSION['email'] = $admin->email;
        $_SESSION['role'] = $admin->role;
        header('location:' . URLROOT . '/admins/crud');
    }

    public function logout() {
        unset($_SESSION['id']);
        unset($_SESSION['login']);
        unset($_SESSION['email']);
        header('location:' . URLROOT . '/posts/home');
    }

    public function crud(){
        if (!empty($_SESSION['id']) && $_SESSION['role']=='admin'){
           $users = $this->adminModel->crud();

        $data = [
            'users' => $users
        ];

        $this->view('admins/crud', $data);
        } else {
                 header('location:' . URLROOT . '/posts/home');
            }
        }
    
}
