<?php 
  
  session_start();
  
  $con=mysql_connect("localhost","root","");
  mysql_select_db("immobilier",$con);
  
 ?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

   <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">     
      
        <link rel="stylesheet" href="css/meanmenu.min.css">
        
</head>


<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php include("cld_admin/header.php"); ?>

      <div class="content-wrapper">
        <section class="content-header">
          <h1>
            <ol class="breadcrumb">
              <li><a href="admin.php"><i class="fa fa-dashboard"></i>Accueil</a></li>
              <li class="active">Modifier</li>
            </ol>
          </h1>



          <section class="agile-volt">
            <div class="agile-voltheader">
              <?php
                if(isset($_GET["msg"])) { 
                  echo "<div class='message'>".$_GET["msg"]."</div>"; 
                } 
              ?>  
            </div>
            <br><br><br>

            

            <div class="table-responsive">

              <table class="table table-striped" id="mydata">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Piece</th>
                    <th>Surface</th>
                    <th>Adresse</th>
                    <th>Prix</th>
                    <th>Description</th>
                    <th>référence</th>
                    <th>catégorie</th>
                    <th>localisation</th>
                    <td ></td>

                  </tr>
                </thead>
                <tbody>

                  <?php 

                      $sql="SELECT * FROM propriete ORDER BY idPrp DESC";
                      $rslt=mysql_query($sql);
                      while ($row=mysql_fetch_array($rslt)) 
                      {
                        $_SESSION['reference']=$row["ref"];
                        echo "<tr>
                                <td>".$row["idPrp"]."</td>
                                  <td>".$row["Piece"]."</td>
                                  <td>".$row["Surface"]."</td>
                                  <td>".$row["Adresse"]."</td>
                                  <td>".$row["Prix"]."</td>
                                  <td>".$row["Description"]."</td>
                                  <td>".$row["ref"]."</td>
                                  <td>".$row["NomCtg"]."</td>
                                  <td>".$row["localisation"]."</td>
                                  <td><a href='modifier-propriete.php'>Modifier</a> &nbsp&nbsp <a href='code_php/supp_prp.php'>Supprimer</a></td>
                                </tr>";
                              }
                  ?>
            </tbody>
            <tfoot>
               <tr>
                <th>id</th>
                <th>Piece</th>
                <th>Surface</th>
                <th>Adresse</th>
                <th>Prix</th>
                <th>Description</th>
                <th>référence</th>
                <th>catégorie</th>
                <th>localisation</th>
              </tr>
            </tfoot>       
          
        </table> 
          
        </div>
      </section>
      
    </section>

    
  </div>


  <?php include("cld_admin/footer.php"); ?>

</div>


<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="bower_components/Chart.js/Chart.js"></script>
<script src="dist/js/pages/dashboard2.js"></script>
<script src="dist/js/demo.js"></script>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>


<script>
  jQuery(document).ready(function(){
    jQuery('#mydata').DataTable();
  });
</script>

</body>
</html>
