
<?php
abstract class Website{

      //Convertis une date de base de données
   public static function convertDateDB($dbDate, $format){
         $dbDate = new DateTime($dbDate);
         $dateFormat = date_format($dbDate, $format) ;
         return $dateFormat;
   }


}

?>