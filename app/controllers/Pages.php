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
    
   public function resultat()
   {
       $this->view('resultat');
   }
   
   

}