<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.png" />

    <title>Traitement</title>

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

    <h1 class="h1_title">Traitement</h1>
    <hr> <br>

<?php 
if (isset($_POST['submit'])) {
   
  $malade=htmlspecialchars($_POST['malade']);
  $nom_maladie=htmlspecialchars($_POST['nom_malade']);
  $date_debut=htmlspecialchars($_POST['date_debut']);
  $date_fin=htmlspecialchars($_POST['date_fin']);
  $frais =htmlspecialchars($_POST['frais']);
  $etat_patient=htmlspecialchars($_POST['etat']);
  $medicament_prescrit=htmlspecialchars($_POST['medicament']);
  
  
  
  $ins_medecins=$connect->prepare("INSERT INTO `traitement` (`id_trai`, `nom_maladie`, `date_debut_trait`, `date_fin_trait`, `frais_trait`, `etat_patient`, `malade_id_malade`, `medicament_prescrit`) VALUES (NULL, :maladie, :date_debut, :date_fin, :frais, :etat, :patient, :medicament)");
  $ins_medecins->bindParam(':maladie' ,$nom_maladie , PDO::PARAM_STR);
  $ins_medecins->bindParam(':date_debut' ,$date_debut, PDO::PARAM_STR);
  $ins_medecins->bindParam(':date_fin' ,$date_fin, PDO::PARAM_STR);
  $ins_medecins->bindParam(':frais' ,$frais , PDO::PARAM_STR);
  $ins_medecins->bindParam(':etat' ,$etat_patient , PDO::PARAM_STR);
  $ins_medecins->bindParam(':patient' ,$malade , PDO::PARAM_STR);
  $ins_medecins->bindParam(':medicament' ,$medicament_prescrit , PDO::PARAM_STR);
  $ins_medecins->execute();
  
 

  if (isset($ins_medecins)) {
    echo "<div class='alert alert-success center' style='width: 90%; margin: auto;'><p>Ajout avec sucees</p></div><br><br>"; 
  }

  else {
   echo "<div class='alert alert-danger center' style='width: 90%; margin: auto;'><p>Error d'ajout</p></div><br><br>";     
  }

echo "<meta http-equiv='refresh' content='5; url = traitement.php' />";

 } 

?>

    <div class="clear"></div>
    <div class="row col-md-10 col-md-offset-1">

      <form id="formID" action="" method="post">
          
              <label class="">Nom du patient: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                  <select name="malade" class="form-control validate[required]">
                  <option selected="selected" value="">Selectionnée</option>
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
     <label class="">Nom de la maladie : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
                  <textarea  class="form-control" name="nom_malade">
                  </textarea>
              </div><br>
    <label class="">Date debut  traiment : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                  <input name="date_debut" type="date" placeholder="" class="form-control validate[required]" />
              </div><br>
       <label class="">Date Fin  traiment : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                  <input name="date_fin" type="date" placeholder="" class="form-control validate[required]" />
              </div><br>
              <label class="">Frais du traiment : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-euro"></i></span>
                  <input name="frais" type="text" placeholder="" class="form-control validate[required]" />
              </div><br>
              <label class="">Etat du patient : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-euro"></i></span>
                  <input name="etat" type="text" placeholder="" class="form-control validate[required]" />
              </div><br>
           <label class="">Les medicaments prescrit : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
                  <textarea  class="form-control" name="medicament">
                  </textarea>
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
