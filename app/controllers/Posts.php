<?php
class Posts extends Controller {
    public function __construct() {
        $this->postModel = $this->model('Post');
        $this->topicModel = $this->model('Topic');
    }

    

    public function home()
    {
        $topics = $this->topicModel->findAllTopics();
        $count = $this->topicModel->countConversation();

        $data = [
            'title'=> 'Home page',
            'topics' => $topics,
            'count'=>$count
        ];
      
        $this->view('posts/home', $data);
    }

   

}