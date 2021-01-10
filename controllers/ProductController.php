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

      if( isset($url[1]) ){
         $view = "ProductInfo" ;
         $data = array(
            "productInfo" => $this->ProductManager->get($url[1]) 
         ) ;
      }
      else{
         $view= "ProductList" ;
         $data = array(
            "productList" => $this->ProductManager->getList()
         ) ;
      }

      $this->View = new View($view);
      $this->View->Popup->setMessage($this->message);
      $this->View->generateView($data);
      /*----------------------------*/
    }






 }




}
  


?>