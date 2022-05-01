<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.png" />
      <link rel="stylesheet" type="text/css" href="boostrap.css">

    <title>Affichage</title>



    

     
        
  </head>
<body>


<?php 
require 'connect.php';
include 'nav.php'; ?> 




<div class="cont">
<br><a class="return" href="index.php"><i class="dly"></i> Retour</a>

    <h1 class="h1_title">Affichage des information</h1>
    <hr> <br>
    <div class="clear"></div>
    <div class="row col-md-10 col-md-offset-1">
<?PHP if (isset($_GET['id_malade']) ){ ?>
      <form>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                  <input name="examen" type="text" placeholder="rechercher un patient" class="form-control validate[required]" />
               </div><br>
        </form>
        
          <table class="table table-striped table-bordered">
          <tr class="tr-table">
            <th >Nom</th>
            <th>Prenom</th>
            <th>Sexe</th>
            <th>adresse</th>
            <th>Temperature</th>
            <th>Poids</th>
           <!-- <th colspan="2">Operation</th>-->
          </tr>
<?php 
  $code=$_GET['id_malade'];
  $stmt_find = $connect->prepare("SELECT * FROM `clinique`.`malade` WHERE `id_malade` = $code");
  $stmt_find->execute();

  while ($find_row = $stmt_find->fetch()) {
	  $fetch_nom=$find_row['nom_malade'];
      $fetch_prenom = $find_row ['prenom_malade'];
      $fetch_sexe = $find_row ['sexe_malade'];
	  $fetch_adresse= $find_row['adr_malade'];
	  $fetch_temperature=$find_row['temperature'];
	  $fetch_poids=$find_row['poids'];
	 
     



?>
            <tr>
              <td><?php echo $fetch_nom;  ?></td>
              <td><?php echo $fetch_prenom;  ?></td>
              <td><?php echo $fetch_sexe; ?></td>
              <td><?php echo $fetch_adresse; ?></td>
              <td><?php echo $fetch_temperature; ?></td>
              <td><?PHP echo $fetch_poids; ?></td>
              
             <!-- <td><a href="?cat_delete=<?PHP echo $fetch_class_numeric; ?>"><i class="glyphicon glyphicon-trash large" style="font-size:26px"></i></a></td>
               <td><a href="#"><i class="glyphicon glyphicon-pencil large"></i></a></td> -->
            
<?php }
 ?>
                 
        </tr>        
      </table> 
<?PHP
}else if(isset($_GET['id_medecins']))
{
?>
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
           <!-- <th colspan="2">Operation</th>-->
          </tr>
<?php 
 $code=$_GET['id_medecins'];
  $stmt_find = $connect->prepare("SELECT * FROM `clinique`.`medecins` WHERE `id_medecins` = $code");
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
             
             <!-- <td><a href="?cat_delete=<?PHP echo $fetch_class_numeric; ?>"><i class="glyphicon glyphicon-trash large" style="font-size:26px"></i></a></td>
               <td><a href="#"><i class="glyphicon glyphicon-pencil large"></i></a></td> -->
            
<?php } ?>
                 
        </tr>        
      </table>           
  <?PHP } ?>
  </div>

<div class="clear"></div>
<br>
        

</div>  
        
                           
           




  </body>
</html>
