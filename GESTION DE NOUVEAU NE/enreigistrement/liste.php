<link rel="stylesheet" type="text/css" href="../style/style.css">
<meta charset="utf-8">
<br><a class="return" href="nouveau.php"><i class="glyphicon glyphicon-arrow-left"></i> Retour</a><br/><br/><br/>


<?php 
include('recherche.php');

if (isset($_POST['submit'])) {
   
  $nom=htmlspecialchars($_POST['nom']);
  $np=htmlspecialchars($_POST['np']);
  $nr=htmlspecialchars($_POST['nr']);
  $dat=htmlspecialchars($_POST['dat']);
  $adr =htmlspecialchars($_POST['adr']);
  $number =htmlspecialchars($_POST['num']);
  $lieu =htmlspecialchars($_POST['lieu']);
   $hop =htmlspecialchars($_POST['hop']);
  $nf =htmlspecialchars($_POST['nf']);
  $ps =htmlspecialchars($_POST['ps']);
  $pr =htmlspecialchars($_POST['pr']);
  $daty =htmlspecialchars($_POST['daty']);
  $heure =htmlspecialchars($_POST['heure']);
  $poids =htmlspecialchars($_POST['poids']);
 
  
  
  $a=$data->prepare("INSERT INTO nve(nom_mere,postnom_mere,prenom_mere,dat_mere,adresse,numero,lieu,nom_lieu,nom_enfant,postnom_enfant,prenom_enfant,dat_enfant,heure,poids) VALUES ('$nom','$np','$nr','$dat','$adr','$number','$lieu','$hop','$nf','$np','$pr','$daty','$heur','$poids')");
 
  $a->bindParam(':nom' ,$nom , PDO::PARAM_STR);
  $a->bindParam(':np' ,$np , PDO::PARAM_STR);
  $a->bindParam(':nr' ,$nr , PDO::PARAM_STR);
  $a->bindParam(':dat' ,$dat , PDO::PARAM_STR);
  $a->bindParam(':adr' ,$adr , PDO::PARAM_STR);
  $a->bindParam(':num' ,$number , PDO::PARAM_STR);
  $a->bindParam(':lieu' ,$lieu , PDO::PARAM_STR);
  $a->bindParam(':hop' ,$hop , PDO::PARAM_STR);
  $a->bindParam(':nf' ,$nf , PDO::PARAM_STR);
  $a->bindParam(':ps' ,$ps , PDO::PARAM_STR);
  $a->bindParam(':pr' ,$pr , PDO::PARAM_STR);
  $a->bindParam(':daty' ,$daty , PDO::PARAM_STR);
  $a->bindParam(':heure' ,$heure , PDO::PARAM_STR);
  $a->bindParam(':poids' ,$poids , PDO::PARAM_STR);
   $a->execute();
if (isset($ins_medecins)) {
    echo "<div class='alert alert-success center' style='width: 90%; margin: auto;'><p>Ajout avec sucees</p></div><br><br>"; 
  }

  else {
   echo "<div class='alert alert-danger center' style='width: 90%; margin: auto;'><p>Error d'ajout</p></div><br><br>";     
  }

echo "<meta http-equiv='refresh' content='5; url = nouveau.php' />";

 } 




?>



<?php
include('db.php');
  $req = $data->prepare("SELECT * FROM nve");
  $req->execute();
  while ($find_row=$req->fetch()) {
      $fetch_nom = $find_row ['nom_mere'];
      $fetch_np = $find_row ['postnom_mere'];
    $fetch_nr= $find_row['prenom_mere'];
    $fetch_dat=$find_row['dat_mere'];
    $fetch_adr=$find_row['adresse'];
     $fetch_number=$find_row['numero'];
      $fetch_lieu=$find_row['lieu'];
       $fetch_hop=$find_row['nom_lieu']; 
        $fetch_nf=$find_row['nom_enfant'];
         $fetch_ps=$find_row['postnom_enfant'];
          $fetch_pr=$find_row['prenom_enfant'];
           $fetch_daty=$find_row['dat_enfant'];
            $fetch_heure=$find_row['heure']; 
             $fetch_poids=$find_row['poids'];

?>      <tr><table class="ta">
          <tr class="tr">
            <th>Nom de la merè</th>&nbsp;
            <th>Postnom</th>&nbsp;
            <th>Prenom</th>&nbsp;&nbsp;
            <th>Date de naissance(merè)</th>&nbsp;
            <th>adresse</th>&nbsp;
            <th>Numero T°</th>&nbsp;&nbsp;
            <th>Lieu d'accouchement</th>&nbsp;
            <th>Etablissement</th>&nbsp;&nbsp;
            <th>Nom de l'enfant</th>&nbsp;
            <th>Postnom</th>&nbsp;
            <th>Prenom</th>&nbsp;
            <th>Date de naissance(enfant)</th>&nbsp;
            <th>Heure de naissance</th>&nbsp;
            <th>Poids de l'enfant</th>&nbsp;

          </tr>
              <td><a  href="?nom_mere=<?PHP echo $fetch_nom; ?>"   title="visualiser les infos de la merè"><br/><?php echo $fetch_nom;  ?><i class="cl"></i></a></td>&nbsp;&nbsp;&nbsp;&nbsp;
              <td><a  href="?postnom_mere=<?PHP echo $fetch_np; ?>" title="visualiser les infos de la merè"><?php echo $fetch_np;  ?><i class="cl"></i></a></td>&nbsp;&nbsp;&nbsp;&nbsp;
              <td><a  href="?prenom_mere=<?PHP echo $fetch_nr; ?>" title="visualiser les infos de la merè"><?php echo $fetch_nr;  ?><i class="cl"></i></a></td>&nbsp;&nbsp;&nbsp;&nbsp;
               <td><a  href="?dat_mere=<?PHP echo $fetch_dat; ?>" title="visualiser les infos de la merè"><?php echo $fetch_dat;  ?><i class="cl"></i></a></td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              
              <td><?php echo $fetch_adr;  ?><a href=".php?adresse=<?PHP echo $fetch_adr; ?>" title="visualiser les infos de la merè"><i class="gl"></i></a></td>&nbsp;&nbsp;&nbsp;&nbsp;
              <td><?php echo $fetch_number;  ?><a href=".php?numero=<?PHP echo $fetch_number; ?>" title="visualiser les infos de la merè"><i class="gl"></i></a></td>&nbsp;&nbsp;&nbsp;&nbsp;
              <td><?php echo $fetch_lieu;  ?><a href=".php?lieu=<?PHP echo $fetch_lieu; ?>" title="visualiser les infos de l'hopital"><i class="dl"></i></a></td>&nbsp;&nbsp;&nbsp;&nbsp;
              <td><?php echo $fetch_hop;  ?><a href="nouveau.php.php?nom_lieu=<?PHP echo $fetch_hop; ?>" title="visualiser les infos de l'hopital"><i class="dl"></i></a></td>&nbsp;&nbsp;&nbsp;&nbsp;
              <td><?php echo $fetch_nf;  ?><a href="nouveau.php.php?nom_enfant=<?PHP echo $fetch_nf; ?>" title="visualiser les infos de l'enfant"><i class="gl"></i></a></td>&nbsp;&nbsp;&nbsp;&nbsp;
              <td><?php echo $fetch_ps;  ?></td>&nbsp;&nbsp;&nbsp;&nbsp;
              <td><?php echo $fetch_pr;  ?></td>&nbsp;&nbsp;&nbsp;&nbsp;
              <td><?php echo $fetch_daty;  ?></td>&nbsp;&nbsp;&nbsp;&nbsp;
              <td><?php echo $fetch_heure;  ?></td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <td><?php echo $fetch_poids;  ?></td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             
<?php } ?>
                 
        </tr>        
      </table>
 </div>
