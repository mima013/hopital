<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.png" />

    <title>Laboratoire</title>

   <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="boostrap.css" rel="stylesheet">
   

    
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

    <h1 class="h1_title">Laboratoire</h1>
    <hr> <br>

<?php 
if (isset($_POST['submit'])) {
   
  $malade=htmlspecialchars($_POST['malade']);
  $examen=htmlspecialchars($_POST['examen']);
  $observation=htmlspecialchars($_POST['observation']);
  $date=htmlspecialchars($_POST['date']);
  $frais =htmlspecialchars($_POST['frais']);
 
  
  
  
  $ins_medecins=$connect->prepare("INSERT INTO `laboratoire` (`id_labo`, `type_examen`, `observation_labo`, `date_examen`, `frais_examen`, `malade_id_malade`) VALUES (NULL, :examen, :observation, :date, :frais, :malade)");
  $ins_medecins->bindParam(':examen' ,$examen , PDO::PARAM_STR);
  $ins_medecins->bindParam(':observation' ,$observation, PDO::PARAM_STR);
  $ins_medecins->bindParam(':date' ,$date, PDO::PARAM_STR);
  $ins_medecins->bindParam(':frais' ,$frais , PDO::PARAM_STR);
  $ins_medecins->bindParam(':malade' ,$malade, PDO::PARAM_STR);
  $ins_medecins->execute();
  
 

  if (isset($ins_medecins)) {
    echo "<div class='alert alert-success center' style='width: 90%; margin: auto;'><p>Ajout avec sucees</p></div><br><br>"; 
  }

  else {
   echo "<div class='alert alert-danger center' style='width: 90%; margin: auto;'><p>Error d'ajout</p></div><br><br>";     
  }

echo "<meta http-equiv='refresh' content='5; url = laboratoire.php' />";

 } 

?>

    <div class="clear"></div>
    <div class="row col-md-10 col-md-offset-1">

      <form id="formID" action="" method="post">
          
              <label class="">Nom du patient: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                  <input name="malade" class="form-control validate[required]">
                  <option selected="selected" value=""></option>
<?php 
  $stmt_find_malade = $connect->query("SELECT * FROM `malade`");

  while ($find_malade_row = $stmt_find_malade->fetch()) {
	  $fetch_malade_code =$find_malade_row['id_malade'];
      $fetch_malade_name = $find_malade_row ['nom_malade'];
	  $fetch_malade_prenom=$find_malade_row['prenom_malade'];

      echo '<option value="'.$fetch_malade_code.'">'.$fetch_malade_name.' '.$fetch_malade_prenom.'</option>';

  } 
?>
                  </select>
              </div><br>
                <label class="">Type d'examen : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-euro"></i></span>
                  <input name="examen" type="text" placeholder="" class="form-control validate[required]" />
              </div><br>
     <label class="">Observation : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
                  <textarea  class="form-control" name="observation">
                  </textarea>
              </div><br>
    <label class="">Date d'examen : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                  <input name="date" type="date" placeholder="" class="form-control validate[required]" />
              </div><br>
       <label class="">Frais de labo : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-euro"></i></span>
                  <input name="frais" type="text" placeholder="" class="form-control validate[required]" />
              </div><br><br> 

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
      <br>
        

</div>  
        
                           
           




  </body>
</html>
