<?php 

/* CONNEXION */ 
$con=mysql_connect("localhost","root","");
mysql_select_db("immobilier",$con);

/* AJOUTER PROPRIETE*/

$localisation=$_POST['localisation'];
$piece=$_POST['piece'];
$surface=$_POST['surface'];
$adresse=$_POST['adresse'];
$prix=$_POST['prix'];
$description=$_POST['description'];
$categorie=$_POST['categorie'];
$vente="oui";

$reff="moi";

if (isset($localisation) and $localisation!="--Selectionnez la localisation--" and isset($piece) and $piece!="--Selectionnez le Nombre de pièces--" and isset($surface) and !empty($surface) and isset($adresse) and !empty($adresse) and isset($prix) and !empty($prix) and isset($description) and !empty($description) and isset($categorie) and $categorie!="--Selectionnez une catégorie--") {


	//ajouter propriete :
	$sql = "INSERT INTO propriete (Piece, Surface, Adresse,Prix,Description,ref,NomCtg,vente,localisation) VALUES ('$piece', '$surface', '$adresse','$prix','$description','$reff','$categorie','$vente','$localisation')";
        mysql_query($sql);

    $id=mysql_insert_id();
	$type=$categorie[0];
	$date=date("y");
	$ref= $id.$type.$date;

	//modifier le refernce :
	$modif="update propriete set ref='$ref' where idPrp='$id'";
		mysql_query($modif);


	//ajouter image :
	$som=count($_FILES['avatar']['name']);
	//var_dump($_FILES['avatar']);die;
	for ($i=0; $i <$som ; $i++) { 
		
		$filename='../img/'.$_FILES['avatar']['name'][$i];
		$requete="INSERT INTO image (urlImg,idPrp) VALUES('$filename','$id')";
		mysql_query($requete);
		move_uploaded_file($_FILES['avatar']['tmp_name'][$i], $filename);
	}
	$message="la la propriété a ete bien ajouter";
	header("location:../admin.php?msg=$message");

}
else{
	$message="Tous les champs sont obligatoires";
	header("location:../ajouter_propriete.php?msg=$message");
}




?>