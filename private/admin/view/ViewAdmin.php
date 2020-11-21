<?php 

require_once('../../view/Popup.php');
require_once('../../view/View.php');

class ViewAdmin extends View{
      
      //Construction de la view
     public function __construct($page){
        //Initialisation par défaut
        $this->file= 'view/viewAdmin'.ucfirst($page).'.php';
        $this->template= "view/adminTemplate.php" ;
        $this->title= $page;
        $this->cssList= ["public/css/".strtolower($page).".css"] ;
        $this->nav= "view/adminNavigation.php";
        $this->scriptList= array() ;
        $this->Popup = new Popup;
      }

        private function getNav(){
          return $this->generateFile($this->nav, array()) ;
        }
  
  
       public function generateView($data){
       
        //PARTIE DE LA VUE
        $contenu = $this->generateFile($this->file, $data);
  
         $nav = $this->getNav();

        //Génération final
        $view = $this->generateFile($this->template, array(
           'title' => $this->title, 
           'content' => $contenu,
           'nav' => $nav,
           'cssList' => $this->cssList,
           'scriptList' => $this->scriptList,
           "scriptList"=> $this->scriptList,
           "Popup" => $this->Popup
        ));
  
        //Intégration de la view
        echo $view;
       
         
       }
  
  
  

  
  
  




}

?>