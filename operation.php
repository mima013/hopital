<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.png" />

    <title>Operations</title>

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

    <h1 class="h1_title">Operations</h1>
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

<ul class="nav nav-tabs text-capitalize" role="tablist" style="background-color:#999; text-justify:!important; color:#FFF;">
        <li class="nav-item active">
          <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Consultation</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Les traitements effectuez</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#laboratoire" role="tab">Les malades transferer au laboratoire</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#patient" role="tab">Les Patients</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#medecins" role="tab">Les medecins</a>
        </li>
        
</ul>
  <!------------------------------------les tab 1------------------------------------------------------------------------->    
 <div class="tab-content" role="tablist">
        <div class="tab-pane active" id="home" role="tabpanel">
        <h1 class="h1 text-info">CONSULTATION</h1>
        <br>
        <br>
        <form>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                  <input name="examen" type="text" placeholder="" class="form-control validate[required]" />
               </div><br>
        </form>
        
          <table class="table table-striped table-bordered">
          <tr class="tr-table">
            <th>Patient</th>
            <th>Medecins</th>
            <th>Observation</th>
            <th>Frais consultation</th>
            <th>Date consulation</th>
            <th colspan="2">Operation</th>
          </tr>
<?php 

  $stmt_find = $connect->prepare("SELECT * FROM `consulte`");
  $stmt_find->execute();

  while ($find_row = $stmt_find->fetch()) {
      $fetch_malade = $find_row ['id_malade'];
      $fetch_medecins = $find_row ['id_medecins'];
	  $fetch_observation= $find_row['obsevation_consult'];
	  $fetch_frais=$find_row['frais_consultation'];
	  $fetch_date=$find_row['date_consultation'];
     



?>
            <tr>
              <td><a  href="affichage.php?id_malade=<?PHP echo $fetch_malade; ?>" title="visualiser les infos du patient"><?php echo $fetch_malade;  ?><i class="glyphicon glyphicon-eye-open large"></i></a></td>
              <td><?php echo $fetch_medecins;  ?><a href="affichage.php?id_medecins=<?PHP echo $fetch_medecins; ?>" title="visualiser les infos du medecins"><i class="glyphicon glyphicon-eye-open large"></i></a></td>
              <td><?php echo $fetch_observation;  ?></td>
              <td><?php echo $fetch_frais;  ?></td>
              <td><?php echo $fetch_date;  ?></td>
              <td><a href="#" title="supprimer"><i class="glyphicon glyphicon-trash large" style="font-size:26px"></i></a></td>
               <td><a href="#" title="Modifier"><i class="glyphicon glyphicon-edit large"></i></a></td> 
            
<?php } ?>
                 
        </tr>        
      </table>
 </div>


 
 <!----------------------------------------tab2---------------------------------------------------------------------------->
        <div class="tab-pane" id="profile" role="tabpanel">
           <br/>
           <br>
           <form>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                  <input name="examen" type="text" placeholder="" class="form-control validate[required]" />
               </div><br>
        </form>
        
          <table class="table table-striped table-bordered">
          <tr class="tr-table">
            <th>Patient</th>
            <th>Nom de la maladie</th>
            <th>date debut du traitement</th>
            <th>date fin du traitement</th>
            <th>Frais du traitement</th>
            <th>Les medicaments prescrit</th>
            <th>Etat du patient</th>
            <th colspan="2">Operation</th>
          </tr>
<?php 

  $stmt_find = $connect->prepare("SELECT * FROM `traitement`");
  $stmt_find->execute();

  while ($find_row = $stmt_find->fetch()) {
	  $fetch_malade=$find_row['malade_id_malade'];
      $fetch_maladie = $find_row ['nom_maladie'];
      $fetch_date_debut = $find_row ['date_debut_trait'];
	  $fetch_date_fin= $find_row['date_fin_trait'];
	  $fetch_frais=$find_row['frais_trait'];
	  $fetch_etat=$find_row['etat_patient'];
	  $fetch_medicament=$find_row['medicament_prescrit'];
     



?>
            <tr>
              <td><a href="affichage.php?id_malade=<?PHP echo $fetch_malade; ?>" title="visualiser les infos du patient"><?PHP echo $fetch_malade; ?><i class="glyphicon glyphicon-eye-open large"></i></a></td>
              <td><?php echo $fetch_maladie;  ?></td>
              <td><?php echo $fetch_date_debut; ?></td>
              <td><?php echo $fetch_date_fin; ?></td>
              <td><?php echo $fetch_frais; ?></td>
              <td><?PHP echo $fetch_etat; ?></td>
              <td><?PHP echo $fetch_medicament; ?></td>
              <td><a href="#"><i class="glyphicon glyphicon-trash large" style="font-size:26px"></i></a></td>
               <td><a href="#"><i class="glyphicon glyphicon-edit large"></i></a></td> 
            
<?php } ?>
                 
        </tr>        
      </table>
        </div>
        
        <!------------------------------------------tab3---------------------------------------------------------------------->
         <div class="tab-pane" id="laboratoire" role="tabpanel">
           <br/>
           <br>
           <form>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                  <input name="examen" type="text" placeholder="" class="form-control validate[required]" />
               </div><br>
        </form>
        
          <table class="table table-striped table-bordered">
          <tr class="tr-table">
            <th>Patient</th>
            <th>Type d'examen</th>
            <th>Observation</th>
            <th>date </th>
            <th>Frais </th>
            <th colspan="2">Operation</th>
          </tr>
<?php 

  $stmt_find = $connect->prepare("SELECT * FROM `laboratoire`");
  $stmt_find->execute();

  while ($find_row = $stmt_find->fetch()) {
	  $fetch_malade=$find_row['malade_id_malade'];
      $fetch_type = $find_row ['type_examen'];
      $fetch_observation = $find_row ['observation_labo'];
	  $fetch_date= $find_row['date_examen'];
	  $fetch_frais=$find_row['frais_examen'];
	 


?>
            <tr>
              <td><a href="affichage.php?id_malade=<?PHP echo $fetch_malade; ?>" title="visualiser les infos du patient"><i class="glyphicon glyphicon-eye-open large"> <?PHP echo $fetch_malade; ?></i></a></td>
              <td><?php echo $fetch_type;  ?></td>
              <td><?php echo $fetch_observation; ?></td>
              <td><?php echo $fetch_date; ?></td>
              <td><?php echo $fetch_frais; ?></td>
            
              <td><a href="#"><i class="glyphicon glyphicon-trash large" style="font-size:26px"></i></a></td>
               <td><a href="#"><i class="glyphicon glyphicon-edit large"></i></a></td> 
            
<?php } ?>
                 
        </tr>        
      </table>
        </div>
      <!--------------------------------------------tab4---------------------------------------------------------------------->
         <div class="tab-pane" id="medecins" role="tabpanel">
           <br/>
           <br>
           <form>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                  <input name="examen" type="text" placeholder="Rechercher un medecins" class="form-control validate[required]" />
               </div><br>
        </form>
        
          <table class="table table-striped table-bordered">
          <tr class="tr-table">
            <th>Nom</th>
            <th>Prenom</th>
            <th>Sexe</th>
            <th>Adresse</th>
            <th>Tel</th>
            <th>Fonctions</th>
            <th colspan="2">Operation</th>
          </tr>
<?php 

  $stmt_find = $connect->prepare("SELECT * FROM `medecins`");
  $stmt_find->execute();

  while ($find_row = $stmt_find->fetch()) {
	  $fetch_nom=$find_row['nom_medecins'];
      $fetch_prenom = $find_row ['prenom_medecins'];
      $fetch_sexe = $find_row ['sexe_medecins'];
	  $fetch_adresse= $find_row['adr_medecins'];
	  $fetch_tel=$find_row['tel_medecins'];
	  $fetch_fonction=$find_row['fonction_medecins'];
	  
?>
            <tr>
              <td><?php echo $fetch_nom;  ?></td>
              <td><?php echo $fetch_prenom;  ?></td>
              <td><?php echo $fetch_sexe; ?></td>
              <td><?php echo $fetch_adresse; ?></td>
              <td><?php echo $fetch_tel; ?></td>
              <td><?PHP echo $fetch_fonction; ?></td>
             
              <td><a href="#"><i class="glyphicon glyphicon-trash large" style="font-size:26px"></i></a></td>
               <td><a href="#"><i class="glyphicon glyphicon-edit large"></i></a></td> 
            
<?php } ?>
                 
        </tr>        
      </table>
        </div>
 <!--------------------------------------tab4-------------------------------------------------------------->
  <div class="tab-pane" id="patient" role="tabpanel">
           <br/>
           <br>
           <form>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                  <input name="examen" type="text" placeholder="rechercher un patient" class="form-control validate[required]" />
               </div><br>
        </form>
        
          <table class="table table-striped table-bordered">
          <tr class="tr-table">
            <th>Nom</th>
            <th>Prenom</th>
            <th>Sexe</th>
            <th>adresse</th>
            <th>Temperature</th>
            <th>Poids</th>
            <th colspan="2">Operation</th>
          </tr>
<?php 

  $stmt_find = $connect->prepare("SELECT * FROM `malade`");
  $stmt_find->execute();

  while ($find_row = $stmt_find->fetch()) {
	  $fetch_nom=$find_row['nom_malade'];
      $fetch_prenom = $find_row ['prenom_malade'];
      $fetch_sexe = $find_row ['sexe_malade'];
	  $fetch_adresse= $find_row['adr_malade'];
    $fetch_poids=$find_row['poids'];
	  $fetch_temperature=$find_row['temperature'];
	 
     



?>
            <tr>
              <td><?php echo $fetch_nom;  ?></td>
              <td><?php echo $fetch_prenom;  ?></td>
              <td><?php echo $fetch_sexe; ?></td>
              <td><?php echo $fetch_adresse; ?></td>
               <td><?PHP echo $fetch_poids; ?></td>
              <td><?php echo $fetch_temperature; ?></td>
             
              
              <td><a href="#"><i class="glyphicon glyphicon-trash large" style="font-size:26px"></i></a></td>
               <td><a href="#"><i class="glyphicon glyphicon-edit large"></i></a></td> 
            
<?php }
 ?>
                 
        </tr>        
      </table>
        </div>
        
     </div>
   </div>
    
        <!--------------------------------------------------- fin tab---------------------------------------------------------------->
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
        
 <?php include 'footer.php'; ?>                           
 <script src="js/bootstrap.min.js"></script>          
<script src="js/popper.min.js"></script>
<script src="js/jquery-slim.min.js"></script>
<script src="js/tab.js"></script>
<script src="js/util.js"></script>


  </body>
</html>
