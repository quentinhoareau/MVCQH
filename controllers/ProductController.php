<?php 

class ProductController{
   private  $View;
   public   $message;
   private  $ProductManager;
   private  $CategoryManager;
   
   // CONSTRUCTEUR 
   public function __construct($url){
      
      if( isset($url) && count($url) > 3 ){
         throw new Exception(null, 404); //Erreur 404
      }
      else{
        
         /*---------MANAGER---------*/
         $this->ProductManager= new ProductManager();
         $this->CategoryManager= new CategoryManager();
         /*------------------*/

         /*---------FORMULAIRE---------*/
         /*------------------*/

     
         /*---------View---------*/
         //Vue Détails
         if( isset($url[1]) && $url[1] >= 1){
            $viewName= "ProductDetails";
            $data= array(
               "Product" => $this->ProductManager->get($url[1]), //Liste des produits
               "CategoryList" => $this->CategoryManager->getList() //Liste des catégories
            );
         }
         //Vue Catalogue
         else{
            $viewName= "ProductCatalog";
            $data= array(
               "ProductList" => $this->ProductManager->getList(), //Liste des produits
            );
         }
        
         $this->View = new View($viewName);
         $this->View->Popup->setMessage($this->message);
         $this->View->generateView($data);
         /*------------------*/
      }
   }
   

}

?>