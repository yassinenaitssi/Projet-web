<!DOCTYPE html>

<html>
<head>
	    
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<meta charset="utf-8">
        

    
<title>Accueil</title>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Cité Universitaire la colombiere</h1>
            <div class="account-wall">
                <img class="profile-img" src="../asset/img/crous_montpellier.png">
                <form class="form-signin" action="../controller/accueil.php" method="post">
                <input type="text" class="form-control" name="Pseudo" id="Pseudo" placeholder="Pseudo" required autofocus>
                <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe" required>
                <input  type="submit" value="Connecter" class="btn btn-primary btn-lg btn-block login-button" ></button>
               
                </form>
            </div>
             
        </div>
    </div>
</body>
</html>


