<?php
class Conversations extends Controller {
    public function __construct() {
        $this->conversationModel = $this->model('Conversation');
        $this->topicModel = $this->model('Topic');
    }

    public function listConversations($id_topic) {
       
        $conversations = $this->conversationModel->findAllConversations($id_topic);
        $topic = $this->topicModel->viewTopic($id_topic);
        $connected = $this->conversationModel->findAllConnected();
        $count = $this->conversationModel->countMessage();


        $data = [
            'id_topic'=>$id_topic,
            'conversations' => $conversations,
            'topic' => $topic,
            'connected' => $connected,
            'count' => $count
        ];
        //On bloque l'acces du visiteur qui transformerait l'adresse http directement
        if(empty($_SERVER['HTTP_REFERER'])){
            header("Location: " . URLROOT . "/posts/home");  
        }
        else{
            $this->view('posts/conversations/listConversations', $data);
        }
    }


    public function crudConversations($id_topic) {
       
        $conversations = $this->conversationModel->findAllConversations($id_topic);
        $topic = $this->topicModel->viewTopic($id_topic);

        $data = [
            'id_topic'=>$id_topic,
            'conversations' => $conversations,
            'topic' => $topic
        ];
        
            $this->view('posts/conversations/crudConversations', $data);
        
    }


    public function create() {
        
        $data = [
            'titre' => '',
            'texte' => '',
            'publication' => '',
            'id_utilisateur' => '',
            'id_topic' => '',
            'liked' => '',
            'disliked' => '',
            'ouvert' => '',
            'visible' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_SESSION['id']))) {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'titre' => trim($_POST['titre']),
                'texte' => trim($_POST['texte']),
                'publication' => date('Y-m-d H:i:s'),
                'id_utilisateur' => trim($_POST['id_utilisateur']),
                'id_topic' => trim($_POST['id_topic']),
                'liked' => 0,
                'disliked' => 0,
                'ouvert'=> 1,
                'visible'=> 1
            ];

            $this->view('resultat', $data);
            
                if ($this-> conversationModel->addConversation($data)) {
                    header("Location: " . URLROOT . '/conversations/listConversations/'.$data['id_topic']);
                } else {
                    die("Erreur système");
                }
         }else{
             $this->view('posts/conversations/createConversation', $data);
         }

    }

    public function modify($id) {
       
        if(!isLoggedIn() || $_SESSION['role'] == 'membre') {
            header("Location: " . URLROOT . "/posts/home");
        }
   
        $conversation = $this->conversationModel->viewConversation($id);
        $id_topic=$conversation->id_topic;
        $topic = $this->topicModel->viewTopic($id_topic);
        $data = [
            'conversation'=> $conversation,
            'topic'=> $topic
        ];

        $this->view('posts/conversations/modifyConversation', $data);    
    }

    public function modifyConversation(){
 
        $data = [
            'id' => '',
            'titre' => '',
            'texte' => '',
            'publication' => '',
            'id_utilisateur' => '',
            'id_topic' => '',
            'liked' => '',
            'disliked' => '',
            'ouvert' => '',
            'visible' => '',
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST' && ($_SESSION['role']!='membre')) {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

           
            $data = [
                'id' => trim($_POST['id']),
                'titre' => trim($_POST['titre']),
                'texte' => trim($_POST['texte']),
                'publication' => trim($_POST['publication']),
                'id_utilisateur' => trim($_POST['id_utilisateur']),
                'id_topic' => trim($_POST['id_topic']),
                'liked' => trim($_POST['liked']),
                'disliked' => trim($_POST['disliked']),
                'ouvert'=> trim($_POST['ouvert']),
                'visible'=> trim($_POST['visible']),
            ];
                
            
                if ($this->conversationModel->modifyConversation($data)) {
                    if($_SESSION['role']=='admin'){
                        header("Location: " . URLROOT . '/conversations/crudConversations/'.$data['id_topic']);
                    }else{
                        header("Location: " . URLROOT . '/conversations/listConversations/'.$data['id_topic']);
                    }
                   
                } else {
                    die("Erreur système");
                }
                    
         }else{
             $this->view('posts/conversations/modifyConversation', $data);
            
         }

    }

    public function liked($data){

        if($_SERVER['REQUEST_METHOD'] == 'POST' && isLoggedIn()) {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'id' => $_POST['id'],
                'liked' => $_POST['liked']+1
            ];
            if ($this->conversationModel->modifyLiked($data)) {
                header("Location: " . URLROOT . "/conversations/listConversations");
            } else {
                die("Erreur système");
            }
        }

    }

    public function disliked($data){

        if($_SERVER['REQUEST_METHOD'] == 'POST' && isLoggedIn()) {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'id' => $_POST['id'],
                'disliked' => $_POST['disliked']+1
            ];
            if ($this->conversationModel->modifyDisliked($data)) {
                header("Location: " . URLROOT . "/conversations/listConversations");
            } else {
                die("Erreur système");
            }
        }

    }

}