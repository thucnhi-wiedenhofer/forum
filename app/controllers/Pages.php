<?php
class Pages extends Controller
{
    

    public function index()
    {
        $data = [
            'title' => 'index'
        ];

        $this->view('index', $data);
    }

    public function regles()
    {
        $data = [
            'title' => 'Règles'
        ];

        $this->view('regles', $data);
    } 
    
    public function inscription()
    {
        $data = [
            'title' => 'Règles'
        ];

        $this->view('users/inscription', $data);
    }  
    
    public function resultat()
    {
        $data = [
            'title' => 'resultat'
        ];

        $this->view('resultat', $data);
    }   
   
   

}