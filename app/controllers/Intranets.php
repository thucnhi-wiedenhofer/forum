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
            $this->view('intranet/listMail', $data);
        }
        
    }

    public function crudMail(){
        if($_SESSION['role']=="admin"){
            $crud = $this->intranetModel->crud();
            $data = ['crud'=>$crud];
            $this->view('admins/crudMail', $data);
        }else{
            header("Location: " . URLROOT . "/posts/home");   
        }
    }

    public function mail($id_destinataire){
        $destinataire = $this->userModel->view($id_destinataire);
        $data= [
            'destinataire'=> $destinataire
        ];
        $this->view('intranet/createMail', $data);
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
                'id_expediteur' => $_SESSION['id'],
                'id_destinataire' => trim($_POST['id_destinataire']),
                'envoi' => date('Y-m-d H:i:s'),
                'signalement'=> 0
            ];

                if ($this-> intranetModel->create($data)) {
                    header("Location: " . URLROOT . "/intranets/listMail/".$_SESSION['id']);
                } else {
                    die("Erreur système");
                }
         }else{
             $this->view('intranet/createMail', $data);
         }

    }

    public function viewMail($id){
       $mail= $this-> intranetModel->view($id);
       $data = [
        'mail' => $mail
    ];
        if($_SESSION['id'] == $data['mail']->id_destinataire){
            $this->view('intranet/viewMail', $data);  
        }else{
            header("Location: " . URLROOT . "/intranets/listMail/".$_SESSION['id']);  
        }
    }

    public function delete($mail){
        if ($this-> intranetModel->delete($mail)) {
            header("Location: " . URLROOT . "/intranets/listMail/".$_SESSION['id']);
        } else {
            die("Erreur système");
        }
    }
  
    public function signalement($id){  
            
            if ($this->intranetModel->signalement($id)) {
                header("Location: " . URLROOT . "/intranets/listMail/".$_SESSION['id']);
            } else {
                die("Erreur système");
            }
        

    }

}