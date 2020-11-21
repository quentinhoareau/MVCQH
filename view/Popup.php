<?php

class Popup{

   // ATTRIBUTS
    public $title = "Popup";
    public $Message;

    

   public function setTitle($valeur){
      $this->title = $valeur;
   }

   //Html possible
   public function setMessage($valeur){
      $this->Message = $valeur;
   }


   public function genererVue(){

      include "view/viewModal.php";

      if( $this->Message != null ){
         echo "<script> popup(\"".$this->title."\",\"".str_replace("\n", "", $this->Message)."\", false); </script>";
      }
   }



}



?>