<?php
class Messages extends Controller {
    public function __construct() {
        $this->messageModel = $this->model('Message');
        $this->conversationModel = $this->model('Conversation');
         $this->topicModel = $this->model('Topic');  
    }

    public function listMessages($id_conversation) {
       
        $conversation= $this->conversationModel->viewConversation($id_conversation);
        $messages = $this->messageModel->findAllMessages($id_conversation);
        $id_topic = $conversation->id_topic;
        $topic= $this->topicModel->viewTopic($id_topic);

        $data = [
            'id_conversation'=> $id_conversation,
            'conversation'=> $conversation,
            'topic' => $topic,
            'messages' => $messages
        ];
        if(empty($_SERVER['HTTP_REFERER'])){
            header("Location: " . URLROOT . "/posts/home");  
        }
        else{
            $this->view('posts/messages/listMessages', $data);
        }
    }

    public function crudMessages($id_conversation) {
       
        $messages = $this->messageModel->findAllMessages($id_conversation);
        $conversation = $this->conversationModel->viewConversation($id_conversation);

        $data = [
            'id_conversation'=>$id_conversation,
            'messages' => $messages,
            'conversation' => $conversation
        ];
        
            $this->view('posts/messages/crudMessages', $data);
        
    }

    public function createMessage() {
        
        $data = [
            'texte' => '',
            'publication' => '',
            'id_utilisateur' => '',
            'id_conversation' => '',
            'liked' => '',
            'disliked' => '',
            'visible' => '',
            'signalement' =>''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_SESSION['id']))) {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                
                'texte' => trim($_POST['texte']),
                'publication' => date('Y-m-d H:i:s'),
                'id_utilisateur' => trim($_POST['id_utilisateur']),
                'id_conversation' => trim($_POST['id_conversation']),
                'liked' => 0,
                'disliked' => 0,
                'visible'=> 1,
                'signalement'=> 0
            ];

            $this->view('resultat', $data);
            
                if ($this-> messageModel->addMessage($data)) {
                    header("Location: " . URLROOT . "/messages/listMessages/".$_POST['id_conversation']);
                } else {
                    die("Erreur système");
                }
         }else{
             $this->view('posts/messages/createMessage', $data);
         }

    }

    public function modify($id) {
       
        $message = $this->messageModel->viewMessage($id);
        $id_conversation=$message->id_conversation;
        $conversation = $this->conversationModel->viewConversation($id_conversation);

        $data = [
            'message'=> $message,
            'conversation'=> $conversation
        ];

        if((isLoggedIn() && $_SESSION['role']== 'membre' && $message->id_utilisateur!=$_SESSION['id']) || !isLoggedIn() ) {
            header("Location: " . URLROOT . "/posts/home");
        }

        $this->view('posts/messages/modifyMessage', $data);    
    }

    public function modifyMessage(){

       

        $data = [
            'id'=> '',
            'texte' => '',
            'publication' => '',
            'id_utilisateur' => '',
            'id_conversation' => '',
            'liked' => '',
            'disliked' => '',
            'visible' => '',
            'signalement' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST' && (($_SESSION['role']=='moderateur' || $_SESSION['id']==$_POST['id_utilisateur'] || $_SESSION['role']=='admin'))) {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

           
            $data = [
                'id' => trim($_POST['id']),
                'texte' => trim($_POST['texte']),
                'publication' => trim($_POST['publication']),
                'id_utilisateur' => trim($_POST['id_utilisateur']),
                'id_conversation' => trim($_POST['id_conversation']),
                'liked' => trim($_POST['liked']),
                'disliked' => trim($_POST['disliked']),
                'visible'=> trim($_POST['visible']),
                'signalement'=> trim($_POST['signalement'])
            ];

            
                if ($this->messageModel->modifyMessage($data)) {
                    if($_SESSION['role']=='admin'){
                        header("Location: " . URLROOT . '/messages/crudMessages/'.$data['id_conversation']);
                    }else{
                        header("Location: " . URLROOT . '/messages/listMessages/'.$data['id_conversation']);
                    }
                   
                } else {
                    die("Erreur système");
                }
         }else{
             $this->view('posts/messages/modifyMessage', $data);
            
         }

    }

    public function liked($data){

        if($_SERVER['REQUEST_METHOD'] == 'POST' && isLoggedIn()) {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'id' => $_POST['id'],
                'liked' => $_POST['liked']+1
            ];
            if ($this->messageModel->modifyLiked($data)) {
                header("Location: " . URLROOT . "/messages/listMessages/".$_POST['id']);
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
            if ($this->messageModel->modifyDisliked($data)) {
                header("Location: " . URLROOT .  "/messages/listMessages/".$_POST['id']);
            } else {
                die("Erreur système");
            }
        }

    }

    public function signalMessage($data){

        if($_SERVER['REQUEST_METHOD'] == 'POST' && isLoggedIn()) {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'id' => $_POST['id'],
                'signalement' => 1
            ];
            if ($this->messageModel->modifySignalMessage($data)) {
                header("Location: " . URLROOT . "/messages/listMessages/".$_POST['id']);
            } else {
                die("Erreur système");
            }
        }

    }

}