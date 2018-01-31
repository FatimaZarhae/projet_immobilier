<?php 

    session_start();

    $con=mysql_connect("localhost","root","");
    mysql_select_db("immobilier",$con);

    $refernece=$_SESSION['reference'];

    if (isset($_SESSION['reference']) and !empty($_SESSION['reference'])) {
        
        $sql="DELETE FROM propriete WHERE ref='".$_SESSION['reference']."'";
       // echo $sql;

        if (mysql_query($sql)) {
            $message="la propriété a été supprimé avec succés";
        } 
        else{
            $message="Erreur pendant la suppression de la propriété";
        }

        header("location:../admin.php?msg=$message");   
   
    }

?>