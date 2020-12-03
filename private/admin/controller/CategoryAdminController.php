<?php 

class CategoryAdminController{
   private $View;
   public $message;
   private $CategoryManager;
   
   // CONSTRUCTEUR 
   public function __construct($url){
      
      if( isset($url) && count($url) > 3 ){
         throw new Exception(null, 404); //Erreur 404
      }
      else{
        
         /*---------MANAGER---------*/
         $this->CategoryManager= new CategoryManager();
         
         //Changement des path pour le BDD
         Database::setConfigPath("../config.ini");
         Database::setLoginPath("../admin_login.ini");
         /*------------------*/


      
         /*---------FORMULAIRE---------*/
         if( isset($_POST["deleteCategory"]) ){ //Si formulaire supprimé
            $this->CategoryManager->delete($_POST["deleteCategory"]);
         }
         if( isset($_POST["addCategory"]) ){ //Si formulaire ajouté
            $this->CategoryManager->add($_POST["addCategory"]);
         }
         if( isset($_POST["updateCategory"]) ){ //Si formulaire modifié
            $this->CategoryManager->update($_POST["editCategory"]);
         }
         /*------------------*/
     
         /*---------View---------*/
         //Info d'un produit
         if(isset($url[2])) {
            $idContact=$url[2];
            $viewName= "CategoryUpdate";
            $data= array(
               "category" => $this->CategoryManager->getCategory($idContact) //Obtenir un produit
            );
         }
         //Liste des produits
         else{
            $viewName= "CategoryList";
            $data= array(
               "categoryList" => $this->CategoryManager->getCategoryList(), //Obtenir la liste des produits
            );
         }

         $data["categoryList"] = $this->CategoryManager->getCategoryList();

         $this->View = new AdminView($viewName);
         $this->View->Popup->setMessage($this->message);
         $this->View->generateView($data) ;
         /*------------------*/
      }
   }

   


   

}

?>