<?php
class Posts extends Controller {
    public function __construct() {
        $this->postModel = $this->model('Post');
        $this->topicModel = $this->model('topic');
    }

    public function home()
    {
        $topics = $this->topicModel->findAllTopics();

        $data = [
            'title'=> 'Home page',
            'topics' => $topics
        ];
      
        $this->view('posts/home', $data);
    }

}