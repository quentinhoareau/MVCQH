<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <base href="<?= SERVER_FOLDER ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="public/bootstrap-4.3.1/bootstrap.min.css">     <!-- Boostrap 4.3.1 -->
    <script src="public/js/jquery.js"></script>                                 <!-- JQuery 3.4.0 -->

    <title> <?php echo $title  ?> </title>                                      <!-- Titre de l'onglet -->

    <link rel="stylesheet" href="public/css/ailtech.css">                       <!-- Css Principal du site -->
    <link rel="stylesheet" href="public/css/navigation.css">                    <!-- Css de la Navigation -->
    <link rel="stylesheet" href="public/css/footer.css">                        <!-- Css du Footer -->
    <link rel="stylesheet" href="public/DataTable/datatable.css">               <!-- Css pour la librerie DataTable -->
    <script src="public/DataTable/datatable.js"> </script>                      <!-- Script pour la librerie DataTable -->
    <link rel="stylesheet" href="public/fontawesome/font-awesome.min.css">      <!-- Css pour les icones avec la librerie Fontawesome -->    
    <?php 
        //Insertion de tous les liens css
        foreach ($cssList as $cssPath) { echo "<link rel='stylesheet' href='$cssPath'>" ; }

        //Insertion de tous scripts JS
        foreach ($scriptList as $scriptPath) { echo "<script src='$scriptPath'></script>" ;}
    ?>            
    
</head>
<body>
 
   
    <?php echo $nav  //Insertion de la bar de navigation ?>
    <?php echo $header  //Insertion de la bar de navigation ?>

    <main role="main" class="container">
        <?php echo $content  //Insertion des contenue de la page active ?>
    </main>


    <?php echo $footer  //Insertion du footer ?>



  
    


  
</body>


        
</html>