<?php 

class ProductAdminController{
   private $View;
   public $message;
   private $ProductManager;
   
   // CONSTRUCTEUR 
   public function __construct($url){
      
      if( isset($url) && count($url) > 3 ){
      
         throw new Exception(null, 404); //Erreur 404

      }
      else{
        
         /*---------MANAGER---------*/
         $this->ProductManager= new ProductManager();

         //Changement des path pour le BDD
         Database::setConfigPath("../config.ini");
         Database::setLoginPath("../admin_login.ini");
         /*------------------*/


      
         /*---------FORMULAIRE---------*/
         if( isset($_POST["deleteProduct"]) ){ //Si formulaire supprimé
            $this->ProductManager->delete($_POST["deleteProduct"]);
         }
         if( isset($_POST["addProduct"]) ){ //Si formulaire supprimé
            $this->ProductManager->add($_POST["addProduct"]);
         }
         if( isset($_POST["updateProduct"]) ){ //Si formulaire supprimé
            $this->ProductManager->update($_POST["editProduct"]);
         }
         /*------------------*/
     
         /*---------View---------*/
         //Info d'un produit
         if(isset($url[2])) {
            $idContact=$url[2];
            $viewName= "ProductInfo";
            $data= array(
               "productInfo" => $this->ProductManager->getProduct($idContact) //Obtenir un contact
            );
         }
         //Liste des produits
         else{
            $viewName= "ProductList";
            $data= array(
               "productList" => $this->ProductManager->getProductList(), //Obtenir la liste des contacts
              // "reponse"     => $this->ProductManager->getReponse($idContact)
            );
         }

         $this->View = new AdminView($viewName) ;
         $this->View->Popup->setMessage($this->message);
         $this->View->generateView($data) ;
         /*------------------*/
      }
   }

   


   

}

?>