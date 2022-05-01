<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.png" />

    <title>Patient</title>

   <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
   

    
     <link rel="stylesheet" href="css/style.css" rel="stylesheet">
     <link rel="stylesheet" href="css/Normalize.css" rel="stylesheet">
     <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">


   

      <script src="js/jquery-1.11.3.min.js"></script>

    

     
        
  </head>
<body>


<?php 
require 'connect.php';
include 'nav.php'; ?> 




<div class="container mainbg">
<br><a class="return" href="index.php"><i class="glyphicon glyphicon-arrow-left"></i> Retour</a>

    <h1 class="h1_title">Patient</h1>
    <hr> <br>

<?php 
if (isset($_POST['submit'])) {
   
  $nom_malade=htmlspecialchars($_POST['nom']);
  $prenom_malade=htmlspecialchars($_POST['prenom']);
  $sexe_malade=htmlspecialchars($_POST['sexe']);
  $adr_malade=htmlspecialchars($_POST['adr']);
  //$tel_malade=htmlspecialchars($_POST['tel']);
  $temperature_malade=htmlspecialchars($_POST['temperature']);
  $poids_malade=htmlspecialchars($_POST['poid']);
  
  $ins_malade=$connect->prepare("INSERT INTO `malade` (`id_malade`, `nom_malade`, `prenom_malade`, `sexe_malade`, `adr_malade`, `temperature`, `poids`) VALUES (NULL, :nom, :prenom, :sexe, :adr, :poid, :temp)");
  $ins_malade->bindParam(':nom' ,$nom_malade , PDO::PARAM_STR);
  $ins_malade->bindParam(':prenom' ,$prenom_malade , PDO::PARAM_STR);
  $ins_malade->bindParam(':sexe' ,$sexe_malade, PDO::PARAM_STR);
  $ins_malade->bindParam(':adr' ,$adr_malade , PDO::PARAM_STR);
  //$ins_malade->bindParam(':tel' ,$tel_malade , PDO::PARAM_STR);
  $ins_malade->bindParam(':poid' ,$poids_malade , PDO::PARAM_STR);
  $ins_malade->bindParam(':temp' ,$temperature , PDO::PARAM_STR);
  $ins_malade->execute();
  
 

  if (isset($ins_malade)) {
    echo "<div class='alert alert-success center' style='width: 90%; margin: auto;'><p>Ajout avec sucees</p></div><br><br>
	<meta http-equiv='refresh' content='5; url = malade.php' />
	"; 
  }

  else {
   echo "<div class='alert alert-danger center' style='width: 90%; margin: auto;'><p>Error d'ajout</p></div><br><br>";     
  }


 } 

?>

    <div class="clear"></div>
    <div class="row col-md-10 col-md-offset-1">

      <form id="formID" action="" method="post">
          
              <label class="">Nom : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input name="nom" type="text" placeholder="" class="form-control validate[required]" />
              </div><br>
               <label class="">Prenom : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input name="prenom" type="text" placeholder="" class="form-control validate[required]" />
              </div><br>
               <label class="">Sexe : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                  <select name="sexe" class="form-control">
                  <option>Seclectionner</option>
                  <option>M</option>
                  <option>F</option>
                  </select>
              </div><br>
               <label class="">Adresse : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
                  <input name="adr" type="text" placeholder="" class="form-control validate[required]" />
              </div><br>
               <!--<label class="">Tel : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
                  <input name="tel" type="text" placeholder="" class="form-control validate[required]" />
              </div><br>-->
               <label class="">Temperature : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
                  <input name="temperature" type="text" placeholder="" class="form-control validate[required]" />
              </div><br>
               <label class="">Poids : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
                  <input name="poid" type="text" placeholder="" class="form-control validate[required]" />
              </div><br>

            <br> 

          <button type="submit" name="submit" class="mybtn mybtn-success">Ajouter</button>     

          <hr id='success'>

      </form>
  
  </div>

<div class="clear"></div>
<?php 
if (isset($_GET['cat_delete']) ) {

$cat_id = $_GET['cat_delete'];

  $stmt_delete = $connect->prepare("DELETE FROM `categorie` WHERE `categorie`.`id_cat`=:id");
  $stmt_delete->bindParam (':id' , $cat_id , PDO::PARAM_STR );
  $stmt_delete->execute();

  if (isset($stmt_delete)) {
    echo "<div class='alert alert-success center' style='width: 90%; margin: auto;'><p>vous avez supprimé avec succés</p></div><br><br>"; 
    echo '<script type="text/javascript"> window.location.href += "#success"; </script>';
    echo "<meta http-equiv='refresh' content='5; url = categorie.php' />";
  }
  
}


 ?>

    <table class="table table-striped table-bordered">
          <tr class="tr-table">
            <th>Numero</th>
            <th>Description</th>
            <th colspan="2">Operation</th>
          </tr>
<?php 

  $stmt_find_class = $connect->prepare("SELECT * FROM `categorie`");
  $stmt_find_class->execute();

  while ($find_class_row = $stmt_find_class->fetch()) {
      $fetch_class_numeric = $find_class_row ['id_cat'];
      $fetch_class_name = $find_class_row ['description'];
     



?>
            <tr>
              <td><?php echo $fetch_class_numeric;  ?></td>
              <td><?php echo $fetch_class_name;  ?></td>
              <td><a href="?cat_delete=<?PHP echo $fetch_class_numeric; ?>"><i class="glyphicon glyphicon-trash large" style="font-size:26px"></i></a></td>
               <td><a href="#"><i class="glyphicon glyphicon-pencil large"></i></a></td> 
            
<?php } ?>
                 
        </tr>        
      </table>

      <br>
        

</div>  
        
                           
           




  </body>
</html>
