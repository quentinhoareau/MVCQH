<?php

class ProductController{
    private $View;
    public $message;
    private $ProductManager;

   public function __construct($url){

    //Si l'url dépasse le nombre de slash indiqué
    if( isset($url) && count($url ) > 2 ){
       throw new Exception('Page introuvable');
    }
    
    else{
      /*--------------MANAGER--------------*/
      $this->ProductManager = new ProductManager();
      /*-----------------------------------*/


      /*--------------Formulaires--------------*/

      /*---------------------------------------*/



      /*-------------VUE------------*/
      $this->View = new View("ProductInfo");
      $this->View->Popup->setMessage($this->message);
      $this->View->generateView(array(
         "productInfo" => $this->ProductManager->getProduct($url[1]) 
      ));
      /*----------------------------*/
    }






 }




}
  


?>