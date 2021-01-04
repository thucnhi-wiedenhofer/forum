<?php
class Posts extends Controller {
    public function __construct() {
        $this->postModel = $this->model('Post');
    }

    public function home()
    {
        $data = [
            'title' => 'Home page'
        ];

        $this->view('posts/home', $data);
    }

    public function conversation()
    {
        $data = [
            'title' => 'Conversations'
        ];

        $this->view('posts/conversation', $data);
    }
}