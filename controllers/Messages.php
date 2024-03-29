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
        $connected = $this->messageModel->findAllConnected();
        $count = $this->conversationModel->countMessage();
        $like = $this->messageModel->countLike();

        $data = [
            'id_conversation'=> $id_conversation,
            'conversation'=> $conversation,
            'topic' => $topic,
            'messages' => $messages,
            'connected' => $connected,
            'count'=> $count,
            'like'=> $like
        ];
        if(empty($_SERVER['HTTP_REFERER'])){
            header("Location: " . WWW_ROOT . "posts/home");  
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
                'visible'=> 1,
                'signalement'=> 0
            ];

                if ($this-> messageModel->addMessage($data)) {
                    header("Location: " . WWW_ROOT . "messages/listMessages/".$_POST['id_conversation']);
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
            header("Location: " . WWW_ROOT . "posts/home");
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
                'visible'=> trim($_POST['visible']),
                'signalement'=> trim($_POST['signalement'])
            ];

            
                if ($this->messageModel->modifyMessage($data)) {
                    if($_SESSION['role']=='admin'){
                        header("Location: " . WWW_ROOT . 'messages/crudMessages/'.$data['id_conversation']);
                    }else{
                        header("Location: " . WWW_ROOT . 'messages/listMessages/'.$data['id_conversation']);
                    }
                   
                } else {
                    die("Erreur système");
                }
         }else{
             $this->view('posts/messages/modifyMessage', $data);
            
         }

    }

    public function liked($id, $id_conversation){

        if(isLoggedIn()) {
            $id_utilisateur=$_SESSION['id'];
            $row= $this->messageModel->verifyLiked($id, $id_utilisateur);
            if(!empty($row)){
                header("Location: ". WWW_ROOT ."messages/listMessages/".$id_conversation);
            }else{
            if ($this->messageModel->createLiked($id, $id_utilisateur)) {
                header("Location: ". WWW_ROOT ."messages/listMessages/".$id_conversation);
            } else {
                die("Erreur système");
            }
        }
    }

    }

    public function disliked($id, $id_conversation){

        if(isLoggedIn()) {
            $id_utilisateur=$_SESSION['id'];
            $row= $this->messageModel->verifyLiked($id, $id_utilisateur);
            if(!empty($row)){
                header("Location: ". WWW_ROOT ."messages/listMessages/".$id_conversation);
            }else{
            if ($this->messageModel->createDisliked($id, $id_utilisateur)) {
                header("Location: ". WWW_ROOT ."messages/listMessages/".$id_conversation);
            } else {
                die("Erreur système");
            }
        }
    }

    }

    public function signalement($id, $id_conversation){

        if(isLoggedIn()) {
           
            if ($this->messageModel->signalement($id)) {
                header("Location: " . WWW_ROOT . "messages/listMessages/".$id_conversation);
            } else {
                die("Erreur système");
            }
        }

    }

}