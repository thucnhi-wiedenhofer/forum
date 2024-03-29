<?php
class Topics extends Controller {
    public function __construct() {
        $this->topicModel = $this->model('Topic');
    }

    public function listTopics() {
        $topics = $this->topicModel->findAllTopics();

        $data = [
            'topics' => $topics
        ];

        $this->view('posts/topics/crudTopic', $data);
    }

   

    public function create() {
        
        if(!isLoggedIn() || $_SESSION['role']=='membre') {
            header("Location: " . WWW_ROOT . "posts/home");
        }
        $topics = $this->topicModel->findAllTopics();

        $data = [
            
            'topics' => $topics,
            'titre' => '',
            'id_utilisateur' => '',
            'date_publication' => '',
            'droits' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST' && ($_SESSION['role']=='admin'|| $_SESSION['role']=='moderateur')) {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'topics' => $topics,
                'titre' => trim($_POST['titre']),
                'id_utilisateur' => trim($_POST['id_utilisateur']),
                'date_publication' => date('Y-m-d H:i:s'),
                'droits' => trim($_POST['droits'])
            ];

            
                if ($this->topicModel->addTopic($data)) {
                    header("Location: " . WWW_ROOT . "posts/home");
                } else {
                    die("Erreur système");
                }
         }else{
             $this->view('posts/topics/create', $data);
         }

    }

    public function modify($id) {
       
        if(!isLoggedIn() || $_SESSION['role']=='membre') {
            header("Location: " . WWW_ROOT . "posts/home");
        }

        $topics = $this->topicModel->findAllTopics();
        $topic = $this->topicModel->viewTopic($id);

        $data = [
            'topic'=> $topic,
            'topics'=> $topics
        ];

        $this->view('posts/topics/modify', $data);    
    }

    public function modifyTopic(){

       // $topics = $this->topicModel->findAllTopics();

        $data = [
            'id'=>'',          
            'titre' => '',
            'id_utilisateur' => '',
            'date_publication' => '',
            'droits' => ''         
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST' && ($_SESSION['role']=='admin'|| $_SESSION['role']=='moderateur')) {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $date = date('Y-m-d H:i:s');
            $data = [
                'id' => trim($_POST['id']),
                'titre' => trim($_POST['titre']),
                'id_utilisateur' => trim($_POST['id_utilisateur']),
                'date_publication' => $date,
                'droits' => trim($_POST['droits'])
            ];

            
                if ($this->topicModel->modifyTopic($data)) {
                    header("Location: " . WWW_ROOT . "topics/listTopics");
                } else {
                    die("Erreur système");
                }
         }else{
             $this->view('posts/topics/modify', $data);
            
         }

    }

}