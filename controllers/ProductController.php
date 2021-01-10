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
         
         //Changement des path pour le BDD
         Database::setConfigPath("../config.ini");
         Database::setLoginPath("../admin_login.ini");
         /*------------------*/

      
         /*---------FORMULAIRE---------*/
         //Action Supprimer
         if( isset($_POST["deleteProduct"]) ){ 
            $this->ProductManager->delete($_POST["deleteProduct"]);
            header("Location: ".ADMIN_HOME."Product");
         }
         //Action Ajouter
         if( isset($_POST["addProduct"]) ){ 
            $published = $_POST['addProduct'];
            $idNewProduct = $this->ProductManager->add($_POST['title'], $_POST['html_content'], $_POST['author_id'], $published);
      
            header("Location: ".ADMIN_HOME."product/update/".$idNewProduct);
         }
         //Action modifier
         if( isset($_POST["updateProduct"]) ){
            if(!isset($_POST["published"])){ $_POST["published"]=0 ; }
            $this->ProductManager->update($_POST["updateProduct"], $_POST["title"], $_POST["html_content"], $_POST["author_id"], $_POST["published"]);
         }
         /*------------------*/
     
         /*---------View---------*/
         //Vue Modifier
         if( isset($url[1]) && $url[1] == "update"  && $url[2] >= 1  ){
            $viewName= "ProductForm";
            $data= array(
               "Product" => $this->ProductManager->get($url[2]), //Obtenir la liste des produits
               "CategoryList" => $this->CategoryManager->getList()
            );
         }
         //Vue Ajouter
         else if( isset($url[1]) && $url[1] == "add"){
            $viewName= "ProductForm";
            $data= array(
               "CategoryList" => $this->CategoryManager->getList()
            );
         }
         //Vue Listing
         else{
            $viewName= "ProductList";
            $data= array(
               "ProductList" => $this->ProductManager->getList(), //Obtenir la liste des produits
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