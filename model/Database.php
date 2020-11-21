<?php 

abstract class Database{
   private static $cnx;

   private static function setBdd(){
      self::$cnx = new PDO('mysql:host=localhost;dbname=mvcqh', 'root', 'root');
      self::$cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
   }

   protected function getDB(){
      if(self::$cnx == null){
         $this->setBdd();
         return self::$cnx;
      }
   }

   //Obtenir le modèle d'un object passé en paramètre
   protected function getModel($obj, $query, array $tabValue = null){
        
         $var = [];
         $req = self::$cnx->prepare($query);
         $req->execute($tabValue);
         if($req != null || empty($req) ){
            while($data = $req->fetch(PDO::FETCH_ASSOC)){
            
               $var[] = new $obj($data);
            }
         }
         else{
            $var = null;
         }

         $req->closeCursor();
         $req = null;
         return $var;
     
   }

   //Exceute 
   protected function execQuery($query, array $tabValue = null){
      $result = null; 
      
      $req = self::$cnx->prepare($query);
      $req->execute($tabValue);
 
      
      @$result = $req->fetchAll(PDO::FETCH_ASSOC) ;

      $req->closeCursor();
      $req = null;
      return $result ;
      

   }



}


?>