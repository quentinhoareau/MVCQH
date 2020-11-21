<?php 

require_once('../../controller/Router.php');


class AdminRouter extends Router{

   public function __construct($url){
      parent::__construct($url, "../../model") ;
   }

   public function routePage(){

      try{
         //Auto chargement des modèles
         spl_autoload_register(function($class){
            require_once($this->modelDirectory.'/'.$class.'.php');
         });
        
         if( count($this->url) >= 1){
          
         //LE CONTROLLEUR ETS INCLU SELON LACTION DE LE L'UTILISATEUR
            $controller = ucfirst(strtolower($this->url[0]));
            $controllerClass = "ControllerAdmin".$controller;
            $controllerFile = "controller/".$controllerClass.".php";
            var_dump($controllerFile);
            //Vérification si le fichier controleur existe
            if( file_exists($controllerFile) ){
               require_once($controllerFile);
               $this->ctrl = new $controllerClass($this->url); //Intenciation de la classe controleur concerné
            }
            else{
             
               throw new Exception('Page introuvable',404);
            }
      
         }
         else{
            require_once('controller/ControllerAdminLogin.php');
            $this->ctrl = new ControllerAdminLogin($this->url);
         }
      }
      catch(Throwable $e){

         //Affichage de la view d'erreur en cas de problème liée au site / serveur
         $this->view = new ViewAdmin('Error');
         $this->view->setCssList(["public/css/erreur.css"]) ;
         $this->view->setHeader("view/header.php") ;
         $this->view->generateView( array("errorTitle" => "Erreur",'errorMessage' => $e->getMessage()) );

      }


   }
}

?>