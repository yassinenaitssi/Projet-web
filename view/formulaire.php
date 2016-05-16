<html>
<head>
	    
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<meta charset="utf-8">
        
<title>formulaire</title>
</head>
	<body>
		<div class="container">
			<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 class="title">Cité Universitaire la colombiere</h1>
	               		<hr />
	               	</div>
	            </div> 
	             <?php 
           if (empty($_COOKIE['pseudo']))
            {header('Location: ../controller/accueil.php');
             exit();}
             ?>
<form action="../controller/formulaire.php" method="post">
	<div class="main-login main-center">
	
						<div class="form-group">
							<label for="residentId" class="cols-sm-2 control-label">residentId </label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="residentId" id="residentId"  placeholder="ResidentId" required/>
								</div>
							</div>
							<label for="Date de naissance" class="cols-sm-2 control-label">Numéro de Salle</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="NumSalle" id="NumSalle"  placeholder="Numero de salle" required/>
								</div>
							</div>
							<label for="Numero de Batiment" class="cols-sm-2 control-label">Numero de Batiment</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="NumeroBat" id="NumeroBat"  placeholder="Numero de Batiment" required/>
								</div>
							</div>
							<label for="mot de passe" class="cols-sm-2 control-label">Date de début</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="date" class="form-control" name="Date_debut" id="Date_debut"  placeholder="Date de début" required/>
									
								</div>
								<label for="mot de passe" class="cols-sm-2 control-label">Date de fin</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="date" class="form-control" name="Date_fin" id="Date_fin"  placeholder="Date de fin" required/>
								</div>
							</div>
							<label  class="cols-sm-2 control-label">Heure de début</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="time" class="form-control" name="Heure_Debut" id="Heure_Debut"  placeholder="Heure de début" required/>
								</div>
							</div>
							<label  class="cols-sm-2 control-label">Heure de fin</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="time" class="form-control" name="Heure_fin" id="Heure_fin"  placeholder="Heure de fin" required/>
								</div>
							</div>
							<label for="confirm" class="cols-sm-2 control-label">Nombre de participant</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="Nombre de participant" class="form-control" name="nombre_participant" id="nombre_participant"  placeholder="Nombre de participant" required/>
								</div>
							</div>
							<input  type="submit" value="Valider" class="btn btn-primary btn-lg btn-block login-button" ></button>
						</div>

	</form>
						
						
						<div class="login-register">
				            <a href="#" name="lien8" value="listeDeFormulaire.php" onclick="self.location.href='listeDeFormulaire.php'">Annuler </a>
				         </div>
				
				</div>
			</div>
		</div>



</div>
</body>
</html>
