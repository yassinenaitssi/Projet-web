<html>
<head>
	    
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<meta charset="utf-8">
        
<title>Salle De travail</title>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Cité universitaire la colombiere</a>
    </div>

           <?php 
           if (empty($_COOKIE['pseudo']))
            {header('Location:../controller/accueil.php');
             exit();}
             ?>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="#" class="text-center new-account" name="lien5" value="resident.php" onclick="self.location.href='resident.php'">Liste des résident </a></li>
         <li class="active"><a href="#" class="text-center new-account" name="lien5" value="saledetravail.php" onclick="self.location.href='salledetravail.php'">Salle de travail <span class="sr-only">(current)</span></a></li>
        <li><a href="#"a href="#" class="text-center new-account" name="lien6" value="listeDeFormulaire.php" onclick="self.location.href='listeDeFormulaire.php'">Formulaire</a></li>


        
       
      </ul>
     
      <ul class="nav navbar-nav navbar-right">
      <form action="../controller/salledetravail.php" method="post" ><input type="hidden" name="submit" value="deconnexion"><button type="submit" class="btn btn-default" ><span class="glyphicon glyphicon-off" aria-hidden="true"></span></button></form>



      
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
 <table class="table table-bordered">
   
      <tr>
        <th>Numero de Batiment</th>
        <th>Numero de Salle</th>
        <th>Nombre de place</th>
        <th>Disponible</th>
        
        
      </tr>
    
 
      <tr>
<?php

foreach($salles as $salle)

{

?>


    <tr>
        <td><?php echo $salle['NumeroBat']; ?></td>
        <td><?php echo $salle['NumSalle']; ?></td>
        <td><?php echo $salle['nombreDePlace']; ?></td>
        <td><?php if ($salle['Disponible'] == 0) {echo "oui";} else {echo "non";}; ?></td>
      
           
<?php

}

?>

    </tr>
    
      </tr>
      
    
  </table>


</div>
</body>
</html>
