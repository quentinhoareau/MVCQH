<?php 



class ControllerAdminLogin{
   private $View;
   public $message;

   // CONSTRUCTEUR
   public function __construct($url){
      
      if( isset($url) && count($url) > 2 ){
         throw new Exception(null, 404); //Erreur 404
      }
      else{
         /*---------FORMULAIRE---------*/
         if( isset($_POST["connectAdmin"])) {
            $this->login($_POST["pwdAdmin"]) ;
         }
         /*----------------------------*/

         /*---------View---------*/
         $this->View = new ViewAdmin('Login') ;
         $this->View->Popup->setMessage($this->message);
         $this->View->generateView( array() ) ;
         /*---------------------*/
      }
   }

   //Se connecter 
   private function login($pwd){
      if($pwd == "admin"){         
         $_SESSION["admin"] = true ;
         header("Location: ".URL_SITE."admin");
      }
      else{
         $this->message = "Ididentifiants incorrecte." ;
      }
   }
   
   //Fermer la session admin (se déconnecter)
   private function deleteAdminSession(){
      $_SESSION["admin"] = null;
      unset($_SESSION["admin"]);
   }



}

?>