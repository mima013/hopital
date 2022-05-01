<?php
if (isset($_POST['submit'])) {

	$nom=$_POST['nom'];
	$np=$_POST['np'];
	$nr=$_POST['nr'];
	$dat=$_POST['dat'];
	$adr=$_POST['adr'];
	$number=$_POST['num'];
	$lieu=$_POST['lieu'];
	$hop=$_POST['hop'];
	$nf=$_POST['nf'];
	$np=$_POST['np'];
	$pr=$_POST['pr'];
	$daty=$_POST['daty'];
	$heur=$_POST['heure'];
	$poids=$_POST['poids'];
include('db.php');
$req=$data->query("INSERT INTO nve(nom_mere,postnom_mere,prenom_mere,dat_mere,adresse,numero,lieu,nom_lieu,nom_enfant,postnom_enfant,prenom_enfant,dat_enfant,heure,poids) VALUES ('$nom','$np','$nr','$dat','$adr','$number','$lieu','$hop','$nf','$np','$pr','$daty','$heur','$poids')");


}else{

}















?>



<!DOCTYPE html>
<html>
<head>
	<title> Gestion de nouveau né</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<body>
	<h1 style="border-top: 3px;border-top-color: #aaf2de;border-color: #efa12c;color:#78deff;text-align: center;">New Born</h1>
	<form method="POST">

	<fieldset style="border:4px;border-radius: 5px;">
		<legend style="color:#133FED;">CORDONNEES DE LA MERE</legend>
		<label>Nom</label><input type="text" name="nom" required="required" maxlength="15"><br/><br/>
		<label>Post-nom</label><input type="text" name="np" required="required" maxlength="20"><br/><br/>
		<label>Prenom</label><input type="text" name="nr" required="required" maxlength="20"><br/><br/>
		<label>Date de naissance</label><input type="date" name="dat" required="required" maxlength="7"><br/><br/>
		<label>Adresse</label><input type="text" name="adr" required="required" maxlength="30"><br/><br/>
		<label>N° telephone</label><input type="number" name="num" required="required" maxlength="13"><br/><br/>
	</fieldset>
	<select name="categorie">
		<option value="oui">OUI</option>
		<option value="nom">NON</option>
	</select>
	<fieldset style="border:2px;border-radius: 5px;">
		<legend style="color:green;">LIEU D'ACCOUCHEMENT</legend>
		<label>Lieu</label><input type="text" name="lieu" required="required" maxlength="14">&nbsp;&nbsp;
		<label>Nom de l'établissement</label><input type="text" name="hop" required="required" maxlength="20"><br/><br/>
	</fieldset>
	<fieldset style="border:2px;border-radius: 5px;">
		<legend style="border-color: 3px; color:red;">CORDONNEES NOUVEAU NE</legend>
		<label>Nom</label><input type="text" name="nf" required="required" maxlength="15"><br/><br/>
		<label>Post-nom</label><input type="text" name="ps" required="required" maxlength="20"><br/><br/>
		<label>Prenom</label><input type="text" name="pr" required="required" maxlength=""> <br/><br/>
		<label>Date de naissance</label><input type="date" name="daty" required="required" maxlength=""> <br/><br/>
		<label>Heure de naissance</label><input type="text" name="heure" required="required" maxlength=""> <br/><br/>
		<label>Poids</label><input type="text" name="poids" required="required" maxlength=""> <br/><br/>

	</fieldset>
	<input type="submit" name="submit" value="Envoyer">
</form

</body>
</html>