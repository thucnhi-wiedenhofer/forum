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

        $this->view('topics/listTopics', $data);
    }

}