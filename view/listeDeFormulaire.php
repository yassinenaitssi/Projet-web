<html>
<head>
      
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
        
<title>Formulaire</title>
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
            {header('Location: ../controller/accueil.php');
             exit();}
             ?>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="#"a href="#" class="text-center new-account" name="lien6" value="resident.php" onclick="self.location.href='resident.php'"> Liste des résident </a></li>
        <li><a href="#" class="text-center new-account" name="lien5" value="salledetravail.php" onclick="self.location.href='salledetravail.php'">Salle de travail</a></li>
        <li class="active"><a href="#" class="text-center new-account" name="lien5" value="listeDeFormulaire.php" onclick="self.location.href='listeDeFormulaire.php'">Formulaire <span class="sr-only">(current)</span></a></li>
        
       
      </ul>
     <form class="navbar-form navbar-large" action="../controller/listeDeFormulaire.php" method="Post">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="chercher par residentId" name="residentId">
        </div>
       <input type="hidden" name="submit" value="search"><button type="submit" class="btn btn-default" ><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button></form>

     
        <form class="navbar-form navbar-right" action="../controller/listeDeFormulaire.php" method="Post"> <input type="hidden" name="submit" value="deconnexion"><button type="submit" class="btn btn-default" ><span class="glyphicon glyphicon-off" aria-hidden="true"></span></button>


 </form>
      
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
 <table class="table table-bordered">
  
      <tr>
        <th>FormulaireId</th>
        <th>ResidentId</th>
        <th>N° salle</th>
        <th>N° Batiment</th>
        <th>Date de début</th>
        <th>Date de fin</th>
        <th>Date de fin reel</th>
        <th>Heure de début</th>
        <th>Heure de Fin</th>
        <th>Heure de Fin reel</th>
        <th>Nombre de participant</th>
       
        <th>Editer</th>
      </tr>
  
<?php

foreach($formulaires as $formulaire)

{

?>


    <tr>
        <td><?php echo $formulaire['formulaireId']; ?></td>
        <td><?php echo $formulaire['residentId']; ?></td>
        <td><?php echo $formulaire['NumSalle']; ?></td>
        <td><?php echo $formulaire['NumeroBat']; ?></td>
        <td><?php echo $formulaire['Date_debut']; ?></td>
        <td><?php echo $formulaire['Date_fin']; ?></td>
        <td><?php echo $formulaire['Date_fin_reel']; ?></td>
        <td><?php echo $formulaire['Heure_Debut']; ?></td>
        <td><?php echo $formulaire['Heure_fin']; ?></td>
        <td><?php echo $formulaire['Heure_fin_reel']; ?></td>
        <td><?php echo $formulaire['nombre_participant']; ?></td>

        <td><button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#<?php echo $formulaire['formulaireId']; ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
<form action="../controller/listeDeFormulaire.php" method="post"> <input type="hidden" name="submit" value="supprimer"><button type="submit" class="glyphicon glyphicon-trash" aria-hidden="true" name = "<?php echo $formulaire['formulaireId']; ?>" value="<?php echo  $formulaire['formulaireId']; ?>"></form></td>
 <!-- Modal -->
 <form action="../controller/listeDeFormulaire.php" method="post">
  <div class="modal fade" id="<?php echo $formulaire['formulaireId']; ?>" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
       <div class="modal-header"> <a class="close" data-dismiss="modal">&times;</a>
        <h3>Modifier</h3>
    </div>
    <div class="modal-body">
             
       
             <div class="control-group">
              <input type="hidden" id="formulaireId" name="formulaireId" value="<?php echo $formulaire['formulaireId']; ?>">
                <label class="control-label" for="N° salle">
                    N° salle : <input type="text" id="NumSalle" name="NumSalle" value="<?php echo $formulaire['NumSalle']; ?>"  required>
                </label>
             </div>
             <div class="control-group">
                <label class="control-label" for="N° Batiment">
                    N° Batiment : <input type="text" id="NumeroBat" name="NumeroBat" value="<?php echo $formulaire['NumeroBat']; ?>" required>
                </label>
             </div>
            <div class="control-group">
                <label class="control-label" for="Date de début">
                   Date de début : <input type="date" id="Date_debut" name="Date_debut" value="<?php echo $formulaire['Date_debut']; ?>" required >
                </label>
             </div>
              <div class="control-group">
                <label class="control-label" for="Date de fin">
                   Date de fin : <input type="date" id="Date_fin" name="Date_fin" value="<?php echo $formulaire['Date_fin']; ?>" required >
                </label>
             </div>
             <div class="control-group">
                <label class="control-label" for="Date de fin reel">
                   Date de fin reel : <input type="date" id="Date_fin_reel" name="Date_fin_reel" value="<?php echo $formulaire['Date_fin_reel']; ?>" required >
                </label>
             </div>
             <div class="control-group">
                <label class="control-label" for="Heure de début">
                   Heure de début : <input type="time" id="Heure_Debut" name="Heure_Debut" value="<?php echo $formulaire['Heure_Debut']; ?>" required >
                </label>
             </div>
             <div class="control-group">
                <label class="control-label" for="Heure de fin">
                   Heure de fin : <input type="time" id="Heure_fin" name="Heure_fin" value="<?php echo $formulaire['Heure_fin']; ?>" required >
                </label>
             </div>
             <div class="control-group">
                <label class="control-label" for="Heure de fin reel">
                  Heure de fin reel : <input type="time" id="Heure_fin_reel" name="Heure_fin_reel" value="<?php echo $formulaire['Heure_fin_reel']; ?>" required >
                </label>
             </div>
              <div class="control-group">
                <label class="control-label" for="Nombre de participant">
                  Nombre de participant : <input type="text" id="nombre_participant" name="nombre_participant" value="<?php echo $formulaire['nombre_participant']; ?>" required >
                </label>
             </div>
      
                
             
    </div>
    <div class="modal-footer">

        <input type="hidden" name="submit" value="modifier"> <button type="submit" class="btn btn-info" aria-hidden="true" name = "<?php echo $formulaire['formulaireId']; ?>" value="<?php echo  $formulaire['formulaireId']; ?>"  >Confirmer</button>
 
  </div>
  </div>
</div>
   </form>        
<?php

}

?>


    </tr>
</table>
<button type="button" class="btn btn-default" href="#" class="text-center new-account" name="lien10" value="formulaire.php" onclick="self.location.href='formulaire.php'">Ajouter</button>
</body>
</html>
