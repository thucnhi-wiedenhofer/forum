<?php
class Pages extends Controller
{
    

    public function index()
    {
        $data = [
            'title' => 'index'
        ];

        $this->view('main/index', $data);
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