<html>
<head>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <meta charset="utf-8">
       
<title>resident</title>
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

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#" class="text-center new-account" name="lien5" value="resident.php" onclick="self.location.href='resident.php'">Liste des résident <span class="sr-only">(current)</span></a></li>
        <li><a href="#" class="text-center new-account" name="lien5" value="salledetravail.php" onclick="self.location.href='salledetravail.php'">Salle de travail</a></li>
         <li><a href="#" class="text-center new-account" name="lien6" value="listeDeFormulaire.php" onclick="self.location.href='listeDeFormulaire.php'"> Formulaire</a></li>
        
       
      </ul>

           <?php 
           if (empty($_COOKIE['pseudo']))
            {header('Location: ../controller/accueil.php');
             exit();}
             ?>
      <form class="navbar-form navbar-large" action="../controller/resident.php" method="Post">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="chercher par residentId" name="residentId">
        </div>
       <form><input type="hidden" name="submit" value="search"><button type="submit" class="btn btn-default" ><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button></form>

     
      <ul class="nav navbar-nav navbar-right">

       <form action="../controller/resident.php" method="Post"><input type="hidden" name="submit" value="deconnexion"><button type="submit" class="btn btn-default" ><span class="glyphicon glyphicon-off" aria-hidden="true"></span></button> </form>





      
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>



 <table class="table table-bordered">
    
      <tr>
        <th>residentId</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Date de naissance</th>
        <th>Numero de Batiment</th>
        <th>Numero de chambre</th>
        <th>Nationalité</th>
        <th>Numero de telephone</th>
        <th>Editer</th>
       
      </tr>
       

<?php

foreach($residents as $resident)

{

?>


    <tr>
        <td><?php echo $resident['residentId']; ?></td>
        <td><?php echo $resident['Nom']; ?></td>
        <td><?php echo $resident['Prenom']; ?></td>
        <td><?php echo $resident['DatedeNaissance']; ?></td>
        <td><?php echo $resident['NumeroBat']; ?></td>
        <td><?php echo $resident['numeroChambre']; ?></td>
        <td><?php echo $resident['nationalite']; ?></td>
        <td><?php echo $resident['numeroDeTelephone']; ?></td>
        <td><button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#<?php echo $resident['residentId']; ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
        <form action="../controller/resident.php" method="post"><input type="hidden" name="submit" value="supprimer"><button type="submit" class="glyphicon glyphicon-trash" aria-hidden="true" name = "<?php echo $resident['residentId']; ?>" value="<?php echo $resident['residentId']; ?>"></form></td>
 <!-- Modal -->
  <form action="../controller/resident.php" method="post">
  <div class="modal fade" id="<?php echo $resident['residentId']; ?>" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
       <div class="modal-header"> <a class="close" data-dismiss="modal">&times;</a>
        <h3>Modifier</h3>
    </div>
    <div class="modal-body">
              <input type="hidden" id="residentId" name="residentId" value="<?php echo $resident['residentId']; ?>">
            <div class="control-group">
                <label class="control-label" for="Nom">
                    Nom : <input type="texte" id="Nom" name="Nom" value="<?php echo $resident['Nom']; ?>">
                </label>
             </div>
               <div class="control-group">
                <label class="control-label" for="Prenom">
                   Prenom : <input type="text" id="Prenom" name="Prenom" value="<?php echo $resident['Prenom']; ?>" >
                </label>
             </div>
             <div class="control-group">
                <label class="control-label" for="Date de naissance">
                    Date de naissance : <input type="text" id="DatedeNaissance" name="DatedeNaissance" value="<?php echo $resident['DatedeNaissance']; ?>" >
                </label>
             </div>
             <div class="control-group">
                <label class="control-label" for="Numero de Batiment">
                    Numero de Batiment : <input type="text" id="NumeroBat" name="NumeroBat" value="<?php echo $resident['NumeroBat']; ?>">
                </label>
             </div>
            <div class="control-group">
                <label class="control-label" for="Numero de chambre">
                    Numero de chambre : <input type="text" id="numeroChambre" name="numeroChambre" value="<?php echo $resident['numeroChambre']; ?>" >
                </label>
             </div>
              <div class="control-group">
                <label class="control-label" for="Nationalité">
                   Nationalité : <input type="text" id="nationalite" name="nationalite" value="<?php echo $resident['nationalite']; ?>">
                </label>
             </div>
             <div class="control-group">
                <label class="control-label" for="Numero de telephone" >
                    Numero de telephone : <input type="text" id="numeroDeTelephone" name="numeroDeTelephone"  value="<?php echo $resident['numeroDeTelephone']; ?>" >
                </label>
             </div>
             
    </div>
    <div class="modal-footer">

          <input type="hidden" name="submit" value="modifier"> <button type="submit" class="btn btn-info" aria-hidden="true" name = "<?php echo $resident['residentId']; ?>" value="<?php echo  $resident['residentId']; ?>"  >Confirmer</button>
 
  </div>
  </div>
</div>
     </form>      
<?php

}

?>

</tr>
    
  </table>


  


  <button type="button" class="btn btn-default" href="#" class="text-center new-account" name="lien1" value="register.php" onclick="self.location.href='register.php'">Ajouter</button>

</div>


 


</body>
</html>

