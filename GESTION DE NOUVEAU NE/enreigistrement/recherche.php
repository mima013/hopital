    <?php
include('db.php');
if(isset($_GET[''])){
$nom=(string) trim($_GET['nom_mere']);
$req=$data->query("SELECT * FROM nve WHERE nom_mere,postnom_mere LIKE ? LIMIT 10",array("$nom%"));
$req=$req->fetchALL();
foreach($req as $r){
?>
<div style="margin-top:20px;border-bottom:2px solid #faa12c;"><?php $r['nom_mere']."".$r['postnom_mere'];?>
</div>
<?php 

}
}

    ?>
    <form method="GET">
             
                  <span class="in"><i class="gy"></i></span>
                  <input id="rc" type="text" placeholder="Rechercher" class="fr" />
               <br/>
        </form>
        <div style="margin-top: 20px;border-radius: 9px;"><div id="res"></div></div> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script>
        	$('#rc').keyup[function(){
        		$('res').html('');
        		var nom=$[this].val();
        		if(nom !=""){
        			$.ajax({
        				type:"GET",
        				url:'liste.php',
        				data:'nom'+encodeURICompoment(nom),
        				succes:function(data){
        					if(data !=""){
        					$('res').append(data);
        					}else{
        					document.getElementById('res').innerHTML="<div style='font-size:20px;text-align:center;border-radius:10px; margin-top:10px">Aucune personne enreigistre à ce nom</div>	

        					}
        				}
        				console.log(nom);
        			})
        		}
        	}]








        </script>
