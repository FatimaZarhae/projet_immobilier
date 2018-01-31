<?php

$conn = mysqli_connect("127.0.0.1", "root","","exelib");      

//Après clic sur le bouton "Envoyer" envoie de données par post
/*if(count($_POST)>2) {
      //récupération et protection des données envoyées
      $titre = mysqli_real_escape_string($conn,$_POST["titre"]);
      $auteur = mysqli_real_escape_string($conn, $_POST["auteur"]);
      $date = mysqli_real_escape_string($conn, $_POST["date"]);
      $sql = "INSERT INTO exercice (titre, auteur, date_creation) VALUES ('{$titre}', '{$auteur}', '{$date}')";
    //exécuter la requête d'insertion
      if (mysqli_query($conn, $sql)) {
      $message= "L’exercice a été ajouté  avec succès";
      } else {
      $message = "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
}
//les autres pages peuvent envoyer un message dans L’URL. On le  récupère ici pour l'afficher dans l’élément "div.message"
if(isset($_GET["message"])){
      $message=$_GET["message"];
}*/

?>


<!doctype html>
<html>
<head>
      <title>PHP CRUD</title>
      <meta charset="utf-8">

      <script src="https://ajax.googleapis.com/ajax/libs/jquery.min.js"></script>
      
      <link rel="stylesheet" href="https://maxcdn.bootstrap/3.3.6/css/bootstrap.mib.css"/>

      <script src="https://cdn.datatables.net/1.10.12/js/jquery.datatables.min.js"></script>

      <script src="https://cdn.datatables.net/1.10.12/js/datatables.bootstrap.min.js"></script>

      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/datatables.bootstrap.min.css"/>
</head>
<body>

      <?php

        if(isset($message)) { 
          echo "<div class='message'>".$message."</div>"; 
        } 
      ?>
      <div class="frm">
            
      
      <form name="exe" action="test.php" method="post">
            <fieldset>
                  <legend>Ajouter un exercice</legend>
            
            <label for="titre">Titre de l'exercice</label>
            <input type="text" id="titre" name="titre" required autofocus><br/>
            <label for="auteur">Auteur de l'exercice</label>
            <input type="text" id="auteur" name="auteur" required><br/>
            <label for="date">Date création</label>
            <input type="date" id="date" name="date" required placeholder="YYYY/MM/DD"><br/>
            <input Type="submit" value="Envoyer">
            </fieldset>
      </form>

      </div>
      
      <div class="grid">
            
              <div class="table-responsive">
                <table id="employee-data" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th>titre</th>
                      <th>auteur</th>
                      <th>date</th>
                    </tr>
                  </thead>
                  <?php 
                    $sql="SELECT * FROM exercice ORDER BY id DESC";
                    $rslt=mysql_query($sql);
                    
                    while ($row=mysql_fetch_array($rslt)) {
                      echo "<tr>
                              <td>".$row["titre"]."</td>
                              <td>".$row["auteur"]."</td>
                              <td>".$row["date_creation"]."</td>
                            </tr>"
                              ;
                            };




                 ?>
                  <tbody>



                  </tbody>
                </table>
              </div>
                  
      </div>

</body>
</html>