<?php 

class ProductAdminController{
   private $View;
   public $message;
   private $ProductManager;
   private $CategoryManager;
   
   // CONSTRUCTEUR 
   public function __construct($url){
      
      if( isset($url) && count($url) > 3 ){
      
         throw new Exception(null, 404); //Erreur 404

      }
      else{
        
         /*---------MANAGER---------*/
         $this->ProductManager= new ProductManager();
         $this->CategoryManager= new CategoryManager();

         //Changement des path pour le BDD
         Database::setConfigPath("../config.ini");
         Database::setLoginPath("../admin_login.ini");
         /*------------------*/


      
         /*---------FORMULAIRE---------*/
         if( isset($_POST["deleteProduct"]) ){ //Si formulaire supprimé
            $this->ProductManager->delete($_POST["deleteProduct"]);
         }
         if( isset($_POST["addProduct"]) ){ //Si formulaire ajouté
            $this->ProductManager->add($_POST["addProduct"]);
         }
         if( isset($_POST["updateProduct"]) ){ //Si formulaire modifié
            $this->ProductManager->update($_POST["updateProduct"]);
         }
         /*------------------*/
     
         /*---------View---------*/
         //Info d'un produit
         if(isset($url[2])) {
            $idContact=$url[2];
            $viewName= "ProductUpdate";
            $data= array(
               "product" => $this->ProductManager->get($idContact) //Obtenir un produit
            );
         }
         //Liste des produits
         else{
            $viewName= "ProductList";
            $data= array(
               "productList" => $this->ProductManager->getList(), //Obtenir la liste des produits
            );
         }

         $data["categoryList"] = $this->CategoryManager->getList();

         $this->View = new AdminView($viewName) ;
         $this->View->Popup->setMessage($this->message);
         $this->View->generateView($data) ;
         /*------------------*/
      }
   }

   


   

}

?>