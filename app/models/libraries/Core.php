<?php
  /*
   * App Core Classe, systéme d'autoloader
   * Crée des URL & charge le core controller
   * URL FORMAT - /controller/méthode/paramétres
   */
  class Core {
      protected $currentController = 'Pages';
      protected $currentMethod = 'index';
      protected $params = [];

    public function __construct(){
      

        //méthode pour éclater l'url
      $url = $this->getUrl();
      
      // vérifie la présence dans controllers 
      if(file_exists('../app/controllers/' . ucwords($url[0]). '.php')){
        // s'il existe, devient le controleur actuel
        $this->currentController = ucwords($url[0]);
        // vide 0 Index
        unset($url[0]);
      }

      // Appelle le controleur
      require_once '../app/controllers/'. $this->currentController . '.php';

      // Instancie la classe du controller 
      $this->currentController = new $this->currentController;

      // vérifie la seconde partie de l'url
      if(isset($url[1])){
        // vérifie si la méthode existe dans le controller
        if(method_exists($this->currentController, $url[1])){
          $this->currentMethod = $url[1];
          // vide 1 index
          unset($url[1]);
        }
      }

      // vérifie les paramétres
      $this->params = $url ? array_values($url) : [];
    

      // fonction de rappel avec tableau de paramétres
      call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl(){
      if(isset($_GET['url'])){
        $url = rtrim($_GET['url'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        return $url;
      }else{
        header('location: ' . URLROOT . '/Pages/index');
      }
    }
  }
