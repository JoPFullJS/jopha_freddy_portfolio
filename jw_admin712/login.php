<?php 
include '../lib/webroot.php'; 
include '../lib/connect.php';
include '../lib/session.php';

session_start(); // début de session

if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    $select = $connect->prepare("SELECT * FROM users WHERE username= :username AND password= :password");

    $select->bindValue('username', $username, PDO::PARAM_STR);
    $select->bindValue('password', $password, PDO::PARAM_STR);

    $select->execute();

    if($select->rowCount() > 0){

        $_SESSION['auth'] = $select->fetch();

        setFlash("Vous êtes maintenant connecté", "success");
        header('Location:../');
    }
    else{
        setFlash("Echec d'authentification !!! login ou mot de passe incorrect","warning");
    	header('Location:warning/');
    }
}
if(isset($_GET['out']) && $_GET['out'] == 'logout'){ // Test sur les paramètres d'URL qui permettront d'identifier un contexte de déconnexion

	unset($_SESSION['auth']);
    session_destroy();
	setFlash("D&eacute;connexion r&eacute;ussie... A bient&ocirc;t !", "success");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="<?= WEBROOT; ?>bootstrap/css/bootstrap.css">
	<!-- utilisation des glyphicon social media -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= WEBROOT; ?>css/devices.css" type="text/css" >
	<link rel="stylesheet" href="<?= WEBROOT; ?>css/admin.css" type="text/css" >
	<title>Connexion Administrateur</title>
	
</head>
<body>
<?php 
if(isset($_GET['out'])){

    switch ($_GET['out']) {
    case "danger":
        setFlash("Echec d'authentification !!! Aucune session n'est ouverte ou vous n'avez pas les droits pour accèder a cette espace.", "danger");
        echo flash();
        break;
    case "logout":

        echo flash();
        break;
    case "warning":

        echo flash();
        break;
    }
}
?>
<section class="login_form article-section">
    <h2>Page de login de l'administrateur</h2>
    <div class="form-content">
            <form id="contact" method="post" action="http://jophafreddy.fr/jw_admin712/login/" enctype="multipart/form-data">

                <div class="form-style">
                    <label for="name">Votre nom* :</label>
                    <input type="text" class="name" placeholder="Administrateur" name="username" id="name">
                </div>
                <div class="form-style">
                    <label for="password">votre mot de passe* :</label>
                    <input type="password" class="password" placeholder="********" name="password" id="password">
                </div>
                <div class="form-submit">
                    <input class="sub_rn" type="submit" name="envoyer" value="Connexion" />
                    <span class="form_rn"></span>
                </div>

            </form>
</section>

</body>
</html>