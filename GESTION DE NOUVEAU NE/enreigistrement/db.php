<?php
//connexion a la base systeme si-system


  $host="localhost";
  $user="root";
  $pass=null;
  $name="gest";
   
   try{
	   $data= new PDO ("mysql:host=$host;dbname=$name",$user,$pass);
	   
	//  echo "connexion etablie !";
	   
	   
	   
   }catch (PDOException $e){
	   
	   echo "Impossible de se connecter" . $e->getMessage();
	   
   }
?>