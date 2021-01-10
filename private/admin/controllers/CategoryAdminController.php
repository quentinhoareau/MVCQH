<?php 

class CategoryAdminController{
   private  $View;
   public   $message;
   private  $CategoryManager;

   
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
         //Action Supprimer
         if( isset($_POST["deleteCategory"]) ){ 
            $this->CategoryManager->delete($_POST["deleteCategory"]);
            header("Location: ".ADMIN_HOME."Category");
         }
         //Action Ajouter
         if( isset($_POST["addCategory"]) ){ 
            $idNewCategory = $this->CategoryManager->add($_POST['label']);
            header("Location: ".ADMIN_HOME."category/update/".$idNewCategory);
         }
         //Action modifier
         if( isset($_POST["updateCategory"]) ){
            $idCategory = $_POST["updateCategory"];
            $this->CategoryManager->update($idCategory, $_POST['label']);
         }
         /*------------------*/
     
          /*---------View---------*/
         //Vue Modifier
         if( isset($url[1]) && $url[1] == "update"  && $url[2] >= 1 ){
            $viewName= "CategoryForm";
            $data= array(
               "Category" => $this->CategoryManager->get($url[2]), //Obtenir la liste des produits
            );
         }
         //Vue Ajouter
         else if( isset($url[1]) && $url[1] == "add"){
            $viewName= "CategoryForm";
            $data= array(
               "CategoryList" => $this->CategoryManager->getList()
            );
         }
         //Vue Listing
         else{
            $viewName= "CategoryList";
            $data= array(
               "CategoryList" => $this->CategoryManager->getList(), //Obtenir la liste des produits
            );
         }
        

         $this->View = new AdminView($viewName);
         $this->View->Popup->setMessage($this->message);
         $this->View->generateView($data) ;
         /*------------------*/
      }
   }
   

}

?>