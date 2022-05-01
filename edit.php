<?php 
require 'connect.php';
?>
 <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.png" />

    <title>Modification</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
   
   

    
    <link href="css/style.css" rel="stylesheet">
    <link href="css/Normalize.css" rel="stylesheet">
   
        
  </head>
<body>

<?php include 'nav.php'; ?>  



<div class="container mainbg">
<br><a class="return" href="index.php"><i class="glyphicon glyphicon-arrow-left"></i> Retour</a>

    <h1 class="h1_title">Editer</h1>
    <hr> <br>

<?php 
if (isset($_GET['update']) == "success") {
  echo "<div class='alert alert-success center' style='width: 90%; margin: auto;'><p>vous avez modifier avec success</p></div><br><br>"; 
}

if (isset($_GET['error']) == "error") {
  echo "<div class='alert alert-danger center' style='width: 90%; margin: auto;'><p>Erreur de modification</p></div><br><br>"; 
}
 ?>

<div class="clear"></div>

<?php 
if (isset($_GET['id_prod'])) {

$id_prod = htmlspecialchars($_GET['id_prod']);

$stmt_get_allInfo = $connect->prepare("SELECT * FROM `produit` WHERE id_prod=:id_prod");
$stmt_get_allInfo->bindParam (':id_prod' , $id_prod , PDO::PARAM_STR );
$stmt_get_allInfo->execute();

if ($stmt_get_allInfo->rowCount() !== 1 ) {
  die("<div class='alert alert-danger center' style='width: 90%; margin: auto;'><p>Desole!</p></div><br><br>");
}

$row_allInfo = $stmt_get_allInfo->fetch();

$nom_prod = $row_allInfo ['nom_prod'];
$qte_prod = $row_allInfo ['qte_prod'];
$cat=$row_allInfo['id_cat'];
$prix = $row_allInfo ['prix'];

if (isset($_POST['updateinfo'])) {

  // $id= htmlspecialchars($_POST['registration_num']);
   $nom_prod = htmlspecialchars($_POST['nom_prod']);
  $qte_prod = htmlspecialchars($_POST['qte_prod']);
   $cat_prod = htmlspecialchars($_POST['cat']);
   $prix = htmlspecialchars($_POST['prix']);
  

  $stmt_prod = $connect->prepare("UPDATE `produit` SET `nom_prod` = :nom, `qte_prod` = :qte, `id_cat` = :cat, `prix` = :prix WHERE `id_prod` = '$id_prod'");
  $stmt_prod->bindParam (':nom' , $nom_prod , PDO::PARAM_STR );
  $stmt_prod->bindParam (':qte' , $qte_prod , PDO::PARAM_STR );
  $stmt_prod->bindParam (':cat' , $cat_prod , PDO::PARAM_STR );
  $stmt_prod->bindParam (':prix' , $prix , PDO::PARAM_STR );
  $stmt_prod->execute();



  if (isset($stmt_prod)) {
    
   echo "<meta http-equiv='refresh' content='0; url = edit.php?student=$id_prod&update=success' />"; 
    
  }

  else {
   //echo "<div class='alert alert-danger center' style='width: 90%; margin: auto; margin-top: 50px'><p>error..!</p></div>";    

      
    echo "<meta http-equiv='refresh' content='0; url = edit.php?student=$id_prod&error=error' />"; 
  }
  
}
  
?>

    <div class="clear"></div>

    <div class="row col-md-12 col-md-offset-0">

<form id="formID" action="" method="post">

         
             <label class="">Nom produit : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
          <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input name="nom_prod" type="text" placeholder="" class="form-control validate[required]" value="<?php echo $nom_prod; ?>"/>
          </div><br>

          <label class="">quantite produit: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
          <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input name="qte_prod" type="text" placeholder="" class="form-control validate[required]" value="<?php echo $qte_prod; ?>"/>
          </div><br>

        
          <label class="">Categorie: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
          <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
              <select name="cat" class="form-control validate[required]">
                <option selected="selected" value="<?PHP echo $cat; ?>"><th>Selectionnée</th></option>
<?php 
  $stmt_find_class = $connect->query("SELECT * FROM `categorie`");

  while ($find_class_row = $stmt_find_class->fetch()) {
      $fetch_class_name = $find_class_row ['description'];

      echo '<option value="'.$fetch_class_name.'">'.$fetch_class_name.'</option>';

  } 
?>
              </select>
          </div>
          <br>
          <label class="">Prix: </label>
          <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
              <input name="prix" type="text" placeholder="" class="form-control" value="<?php echo $prix; ?>"/>
          </div><br>      

          <button type="submit" name="updateinfo" class="mybtn mybtn-primary">Valider</button><br><br>
  


 </form>
 <br>
 </div>
 <?PHP
}
 ?>

 
</div>
  
                           
 <?php include 'footer.php'; ?>             

  



  </body>
</html>
