<?php 
	
	session_start();

	$con=mysql_connect("localhost","root","");
	mysql_select_db("immobilier",$con);

	

	$refernece=$_SESSION['reference'];

		$localisation=$_POST['localisation'];
        $piece=$_POST['piece'];
        $surface=$_POST['surface'];
        $adresse=$_POST['adresse'];
        $prix=$_POST['prix'];
        $description=$_POST['description'];
        $categorie=$_POST['categorie'];

        if (isset($_SESSION['reference']) and !empty($_SESSION['reference']) {
          if ($surface !="" or $adresse !="" or $prix !="" or $description !="") 
          {
            $sql="UPDATE propriete SET location='$localisation' , piece=$piece , surface=$surface , adresse='$adresse' , prix=$prix , description='$description' , categorie='$categorie' WHERE ref='".$_SESSION['ref']."'";
            mysql_query($sql);
           
            if (mysql_query($sql)) {
            	$message="la propriété a été mis à jour avec succes";
	        } 
	        else{
	            $message="Erreur pendant la modification de la propriété";
	        }
          }
          else{
          	$message="Tous les champs sont obligatoires";
          }

          header("location:../admin.php?msg=$message");
        }











?>