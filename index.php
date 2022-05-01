<?PHP 
require 'connect.php'; 
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="boostrap.css">

    <title>Accueil</title>

      <script src="js/jquery-1.11.3.min.js"></script>

        
  </head>
<body>

<?php include 'nav.php'; ?> 


<div class="container main" style="margin-top: 100px;">
<?php 

$dir    = '../install/';
//si le fichier install alors le message d'erreur
if (is_dir($dir))  {
   echo "<div class='alert alert-warning' style='margin: auto;'>
    <h3>Bienvenue dans Application !</h3>
    <p>Nous vous remercions de votre choix :) Vous pouvez maintenant commencer à courir votre établissment..!</p>
    <br>
    <span style='font-size: 14px;'' class='label label-default'>Mais avant cela pour des raisons de sécurité, vous devez supprimer le dossier d'installation nommé [install] </span>
    <p>Vous le trouverez dans le dossier principal.</p>
    
</div><br><br>";
}

 ?>



<div class="row">

<?php 

  $stmt_count_produit = $connect->prepare("SELECT * FROM `consulte`");
  $stmt_count_produit->execute();
  $count_produit= $stmt_count_produit->rowCount();

  $stmt_count_teachers = $connect->prepare("SELECT * FROM `traitement`");
  $stmt_count_teachers->execute();
  $count_teachers = $stmt_count_teachers->rowCount();

/*  $stmt_count_eleve = $connect->prepare("SELECT * FROM eleve");
  $stmt_count_eleve->execute();
  $count_eleve = $stmt_count_eleve->rowCount();*/

 /* $stmt_count_topics = $connect->prepare("SELECT * FROM topics");
  $stmt_count_topics->execute();
  $count_topics = $stmt_count_topics->rowCount();*/


   ?>

 <div class="clear"></div><br>


    <div class="col-md-4">
      <a href="malade.php">
          <div class="link">
            <i class="fa fa-users"></i>
            <div class="clear"></div><span class="ajouter">Ajoutez un Patient</span>
         </div>
      </a>
    </div>&nbsp&nbsp
    
     <div class="col-md-4">
      <a href="consultation.php">
          <div class="link">
            <i class="fa fa-plus"></i>
            <div class="clear"></div><span class="eff">Effectuez une consulation</span>
         </div>
      </a>
    </div>&nbsp&nbsp
    
    <div class="col-md-4">
      <a href="traitement.php">
          <div class="link">
            <i class="fa fa-ambulance"></i>
            <div class="clear"></div><span class="menu">Traitement</span>
         </div>
      </a>
    </div>&nbsp&nbsp
    <div class="col-md-4">
      <a href="laboratoire.php">
          <div class="link">
            <i class="fa fa-medkit"></i>
            <div class="clear"></div><span class="li">Laboratoire</span>
         </div>
      </a>
    </div>&nbsp&nbsp
    
     <div class="col-md-4">
      <a href="Medecins.php">
          <div class="link">
            <i class="fa fa-user"></i>
            <div class="clear"></div><span class="me">Ajoutez un Medecins</span>
         </div>
      </a>
    </div>&nbsp&nbsp
    
     <div class="col-md-4">
      <a href="operation.php">
          <div class="link">
            <i class="fa fa-cog"></i>
            <div class="clear"></div><span class="lo">Operation</span>
         </div>
      </a>
    </div>
  


       <h1 style="color: red"><img class="am" src="lm.JPG" height="400px" width="1300px" border="1px" title=""> <div class="col-m-4">
      <a href="GESTION DE NOUVEAU NE/index.php">
          <div class="link">
            <i class="fa fa-ambulance"></i>
            <div class="clear"></div><span class="lo">Gestion de nouveau né</span>
         </div><br/>
      </a>
    </div></h1>


<?php include 'footer.php'; ?>             

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="font/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>



  </body>
</html>

