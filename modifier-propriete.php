<?php 

  $con=mysql_connect("localhost","root","");
  mysql_select_db("immobilier",$con);

  session_start();

  $reference=$_SESSION['reference'];

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

  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
  function hideURLbar(){ window.scrollTo(0,1); } </script>
  
  <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
  <link href="//fonts.googleapis.com/css?family=Heebo:300" rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Exo" rel="stylesheet">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/dataTables.bootstrap.min.css">


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
         
        </div><br>
       
        <div class="agile-voltsub">
            
          <?php if (isset($reference) and !empty($reference)) {
              $sql="SELECT localisation,Piece,Surface,Adresse,Prix,Description,NomCtg FROM propriete where ref='$reference'";
              $rslt=mysql_query($sql);
              while ($row=mysql_fetch_array($rslt)) {
                echo "
                      <form action='code_php/modif_prp.php' method='post' enctype='multipart/form-data'>
                        <div class='agile'>
                          <select name='localisation' id='select'>
                            <option>".$row["localisation"]."</option>";
                            $requete="SELECT nomVille from ville WHERE nomVille!='".$row["localisation"]."'";
                            $res=mysql_query($requete);
                            while ($row1=mysql_fetch_array($res)) {
                              echo '<option value='.$row1["nomVille"].'>'.$row1["nomVille"].'</option>';
                            }
                          echo "</select>
                        </div>
                        <input type='hidden' name='ref' value='".$row["ref"]."'>

                        <div class='agile'>
                          <select name='piece' id='select'>
                            <option>".$row["Piece"]."</option>
                            <option value='1'>1</option>
                            <option value='2'>2</option>
                            <option value='3'>3</option>
                            <option value='4'>4</option>
                            <option value='5'>5</option>
                            <option value='6'>6</option>
                            <option value='7'>7</option>
                          </select>
                        </div>

                        <div class='clear'></div>
                        <div class='agile'>
                          <input type='text' name='surface' value='".$row["Surface"]."'>
                        </div><br>

                        <div class='clear'></div>
                        <div class='agile'>
                          <input type='text' name='adresse' value='".$row["Adresse"]."'>
                        </div><br>

                        <div class='clear'></div>
                        <div class='agile'>
                          <input type='text' name='prix' value='".$row["Prix"]."'>
                        </div><br>

                        <div class='clear'></div>
                        <div class='agile'>
                          <input type='text' name='description' value='".$row["Description"]."'>
                        </div><br>

                        <div class='clear'></div>
                        <div class='agile'>
                          <select name='categorie' id='select'>
                            <option>".$row["NomCtg"]."</option>";
                            $requete1="SELECT NomCtg from categorie WHERE NomCtg !='".$row["NomCtg"]."'";
                            $res1=mysql_query($requete1);
                            while ($row2=mysql_fetch_array($res1)) {
                              echo'<option value='.$row2["NomCtg"].'>'.$row2["NomCtg"].'</option>';
                            }
                          echo "</select>
                        </div>
                        

                        <input type='submit' value='Modifier' />
                      </form>
              ";
            }
          }
          
        ?>

        </div>
      </section>
      
    </section>

    
  </div>


  <!-- /.content-wrapper -->

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

<script src="js/vendor/jquery-1.11.3.min.js"></script>    
        <script src="js/bootstrap.min.js"></script>
            
        <script src="inc/custom-slider/js/jquery.nivo.slider.js"></script>
        <script src="inc/custom-slider/home.js"></script> 
        <script src="inc/lightslider.js"></script>
            
        <script src="js/wow.min.js"></script>   
        <script src="js/jquery-price-slider.js"></script>   
        <script src="js/jquery.meanmenu.js"></script>   
        <script src="js/owl.carousel.min.js"></script>    
        <script src="js/uikit.min.js"></script>   
        <script src="js/jquery.scrollUp.min.js"></script>
        <script src="inc/jquery.counterup.min.js"></script>
        <script src="inc/waypoints.min.js"></script>    
        <script src="js/jquery.mixitup.min.js"></script>    
        <script src="js/plugins.js"></script>   
        <script src="js/main.js"></script>
</body>
</html>


