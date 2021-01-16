<?php
class Intranets extends Controller {
    public function __construct() {
        $this->intranetModel = $this->model('Intranet');
        $this->userModel = $this->model('User');
          
    }

    public function listMail($id_user) {
        if($_SESSION['id']!=$id_user){
            header("Location: " . URLROOT . "/posts/home");  
        }
        else{
            $receipt = $this->intranetModel->receipt($id_user);
            $sent= $this->intranetModel->sent($id_user);
            
            $data = [            
            'receipt'=> $receipt,
            'sent'=> $sent
            ];
            $this->view('Intranet/listMail', $data);
        }
        
    }
    
    public function create() {
      
        $data = [
            'objet' => '',
            'texte' => '',
            'id_expediteur' => '',
            'id_destinataire' => '',
            'envoi' => '',
            'signalement' =>''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_SESSION['id']))) {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'objet' => trim($_POST['objet']),
                'texte' => trim($_POST['texte']),                
                'id_expediteur' => trim($_POST['id_expediteur']),
                'id_destinataire' => trim($_POST['id_destinataire']),
                'envoi' => date('Y-m-d H:i:s'),
                'signalement'=> 0
            ];

                if ($this-> intranetModel->create($data)) {
                    header("Location: " . URLROOT . "/intranet/listMail/".$_POST['id_expediteur']);
                } else {
                    die("Erreur système");
                }
         }else{
             $this->view('Intranet/listMail', $data);
         }

    } 
  
    public function signalement($data){

        if($_SERVER['REQUEST_METHOD'] == 'POST' && isLoggedIn()) {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'id' => $_POST['id'],
                'signalement' => 1
            ];
            if ($this->intranetModel->signalement($data)) {
                header("Location: " . URLROOT . "/intranet/listMail/".$_SESSION['id']);
            } else {
                die("Erreur système");
            }
        }

    }

}