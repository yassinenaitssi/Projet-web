
<html lang="en">
<head> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<meta charset="utf-8">
	
	<title>créer un compte</title>
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
			<form action="../controller/register.php" method="post">

				<div class="main-login main-center">
					
					<div class="form-group">
						<label  class="cols-sm-2 control-label">Nom </label> : 
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="Nom" id="Nom"  placeholder="Nom"/>
							</div>
						</div>
						<label class="cols-sm-2 control-label">Prenom</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="Prenom" id="Prenom"  placeholder="Prenom"/>
							</div>
						</div>
						<label class="cols-sm-2 control-label">Date de naissance</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="DatedeNaissance" id="DatedeNaissance"  placeholder="Date de naissance"/>
							</div>
						</div>
						<label class="cols-sm-2 control-label">Numero de Batiment</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="NumeroBat" id="NumeroBat"  placeholder="Numero de Batiment"/>
							</div>
						</div>
						<label class="cols-sm-2 control-label">Numero de chambre</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
								<input type="texte" class="form-control" name="numeroChambre" id="numeroChambre"  placeholder="Numero de chambre"/>
							</div>
						</div>
						<label  class="cols-sm-2 control-label">Nationalité</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
								<input type="texte" class="form-control" name="Nationalité" id="Nationalité"  placeholder="Nationalité"/>
							</div>
						</div>
						<label  class="cols-sm-2 control-label">Numero de telephone</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
								<input type="texte" class="form-control" name="numeroDeTelephone" id="numeroDeTelephone"  placeholder="Numero de telephone"/>
							</div>
						</div>
						<p></p>
						<input  type="submit" value="Valider" class="btn btn-primary btn-lg btn-block login-button" ></button> 


					</div>
					


				</form>

			</div>
			<div class="login-register">
				<a  name="lien2" value="resindent.php" onclick="self.location.href='resident.php'">Quitter </a>
			</div>
		</form>
	</div>
</div>
</div>


</body>
</html>