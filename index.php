
<?php

/*****Gestionnaire d'erreur php personalisé*****/
set_error_handler('exceptions_error_handler');
function exceptions_error_handler($severity, $message, $filename, $lineno) {
   if (error_reporting() == 0) {
      return;
   }
   if (error_reporting() & $severity) {
      throw new ErrorException($message, 500, $severity, $filename, $lineno);
   }
}
/*****---------------------------------*****/

$urlHome = str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http" . "://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']) ) ;
define('HOME',  $urlHome) ;

$serverFolder= dirname($_SERVER['PHP_SELF'])."/";
$activeLink = str_replace($serverFolder,"",$_SERVER['REQUEST_URI']) ;

define('ACTIVE_LINK',  $activeLink) ;
define('SERVER_FOLDER',  $serverFolder) ;

require_once('view/Popup.php');
require_once('view/View.php');
require_once('controller/Router.php');

   //Récupération de chaque partie de l'url 
   if( isset($_GET["url"]) ){
      $url = explode('/', filter_var( $_GET['url'], FILTER_SANITIZE_URL) ); 
   }
   else{ $url = array() ;}
 

   $routeur = new Router($url);
   $routeur->routePage();



?>
