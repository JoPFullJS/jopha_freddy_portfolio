<?php 
// Fichier constants.php defini les differentes constante d'URI pour divers liens dans mon application.
include '../../lib/webroot.php'; 
include '../../lib/connect.php';
include '../../lib/session.php';


session_start(); // On relaye la session
if (isset($_SESSION['auth'])){ // vérification sur la session authentification (la session est elle enregistrée ?)
// ici les éventuelles actions en cas de réussite de la connexion
	extract($_SESSION['auth']);
}
else {
	header('Location:../login/danger/'); // redirection en cas d'echec
}

if(isset($_POST['id']) && isset($_POST['slug']) && isset($_POST['titre'])){

	$titre = htmlentities($_POST['titre']);
	$categorie = $_POST['categorie'];
	$competence = $_POST['competence'];
	$slug = htmlentities($_POST['slug']);
	$date = htmlentities($_POST['date']);
	$projet = htmlentities($_POST['projet']);
	$technique = htmlentities($_POST['technique']);
	$fonctionnel = htmlentities($_POST['fonctionnel']);
	$source = htmlentities($_POST['source']);
	$mediocre = htmlentities($_POST['mediocre']);
	$convenable = htmlentities($_POST['convenable']);
	$bon = htmlentities($_POST['bon']);
	$tres_bon = htmlentities($_POST['tres_bon']);
	$excellent = htmlentities($_POST['excellent']);
	$nb_vue = htmlentities($_POST['nb_vue']);
	
    $insert_travaux = $connect->prepare("INSERT INTO travaux SET id_cat_travx= :categorie, id_comp_travx= :competence, titre= :titre, slug= :slug, projet= :projet, technique= :technique, fonctionnel= :fonctionnel, source= :source");
    $insert_travaux->bindValue('categorie', $categorie, PDO::PARAM_INT);
    $insert_travaux->bindValue('competence', $competence, PDO::PARAM_INT);
    $insert_travaux->bindValue('titre', $titre, PDO::PARAM_STR);
    $insert_travaux->bindValue('slug', $slug, PDO::PARAM_STR);
    $insert_travaux->bindValue('date', $date, PDO::PARAM_STR);
    $insert_travaux->bindValue('projet', $projet, PDO::PARAM_STR);
    $insert_travaux->bindValue('technique', $technique, PDO::PARAM_STR);
    $insert_travaux->bindValue('fonctionnel', $fonctionnel, PDO::PARAM_STR);
    $insert_travaux->bindValue('source', $source, PDO::PARAM_STR);

    $insert_travaux->execute();

    $lastId = $connect->lastInsertId();


    $connect->exec('INSERT INTO compteur SET id_travx_compteur= '. $connect->quote($lastId));

    $connect->exec('INSERT INTO statistiques SET id_travx_stat= '. $connect->quote($lastId));


    if($insert_travaux->execute()){
		setFlash("L'élément à été créer avec succès !", "success");
		header('Location: ../');
	}
	else{
		setFlash("L'élément n'a pas pu être insérer !", "danger");
		header('Location: ../');
	}

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
	<title>Insérer un projet</title>
	
</head>
<body>
	<header class="menu-desktop">
		<div class="container-fluid">
			<div id="hamburger">
				<span class="top"></span>
				<span class="middle"></span>
				<span class="bottom"></span>
			</div>
			<div id="logo-jw">
				<a href="<?= WEBROOT; ?>jw_admin712/" title="Jopha Freddy"><img src="<?= WEBROOT; ?>img/main/jophafreddy.png" alt="Jopha Freddy"></a>
			</div>
			
			<nav class="navigation margin-left-30 visible-lg visible-md">
				<ul class="nav-haut">
					<li class="group-desktop">
						<a href="<?= WEBROOT; ?>jw_admin712/domaines-intervention/" title="Intervention" class="white lh-50-pg-25 hover deco" id="services">Interventions</a>			
					</li>
					<li class="group-desktop"><a href="<?= WEBROOT; ?>jw_admin712/services/" title="Services" class="white lh-50-pg-25 hover deco">Services</a></li>
					<li class="group-desktop">
						<a href="<?= WEBROOT; ?>jw_admin712/competences/" title="Compétences" class="white lh-50-pg-25 hover deco" id="blog">Compétences</a>						
					</li>
					<li class="group-desktop"><a href="<?= WEBROOT; ?>jw_admin712/experiences/" title="Expériences" class="white lh-50-pg-25 hover deco">Expériences</a></li>
					<li class="group-desktop"><a href="<?= WEBROOT; ?>jw_admin712/travaux/" title="Travaux" class="white lh-50-pg-25 hover deco select-categorie">Travaux</a></li>
				</ul>
			</nav>
			<div class="logout">	
				<a href="<?= WEBROOT; ?>jw_admin712/login/logout/">Logout</a>
					
			</div>
		</div>
	</header>
	<div style="height: 100px; width: 100%;"></div>
	<section class="qui-suis-je article-section">
		<h2>Inserer un élément</h2>
		<div class="form-content">
			<form id="contact" method="post" action="#"  enctype="multipart/form-data">
				<div class="form-style">
						<label>ID competence (Front =1, back=2, UI design=3) :</label>
						<input type="text" name="competence">
				</div>
				<div class="form-style">
						<label>Titre :</label>
						<input type="text" name="titre">
				</div>
				<div class="form-style">
						<label>Slug :</label>
						<input type="text" name="slug">
				</div>
				<div class="form-style">
						<label>Mediocre :</label>
						<input type="text" name="mediocre">
				</div>
				<div class="form-style">
						<label>Convenable :</label>
						<input type="text" name="convenable">
				</div>
				<div class="form-style">
						<label>Bon :</label>
						<input type="text" name="bon">
				</div>
				<div class="form-style">
						<label>Très bon :</label>
						<input type="text" name="tres_bon">
				</div>
				<div class="form-style">
						<label>Excellent :</label>
						<input type="text" name="excellent">
				</div>
				<div class="form-style">
						<label>Nombre de vues :</label>
						<input type="text" name="nb_vue">
				</div>
				<div class="form-style">
						<label>Date :</label>
						<input type="text" name="date">
				</div>
				<div class="form-style">
						<label>Environement technique :</label>
						<input type="text" name="technique">
				</div>
				<div class="form-style">
						<label>Sources :</label>
						<input type="text" name="source">
				</div>
				<div class="form-message">
					<label>Projet :</label>
					<textarea name="projet"></textarea>
				</div>
				<div class="form-message">
					<label>Compétences fonctionnelles :</label>
					<textarea name="fonctionnel"></textarea>
				</div>
				<div class="form-submit">
				<!-- on mettra les info de soumissiona ce niveau pour les requetes ajax -->
					<input class="sub_rn" type="submit" name="envoyer" value="Insert projet">
				</div>
			</form>
		</div>
	</section>
	<footer class="footer">
		<div class="arrow-up">
			<a href="#conteneur" title="Retour en haut" class="scroll-up"><span class="glyphicon glyphicon-chevron-up"></span></a>
		</div>
		<div class="footer-social-media">
			<ul class="block-social">
				<li>
					<a href="">
						<span class="fa fa-github"></span>
						<p>/JoPFullJS</p>
					</a>
				</li>
				<li>
					<a href="">
						<span class="fa fa-pinterest"></span>
						<p>/JophaUI</p>
					</a>
				</li>
				<li>
					<a href="">
						<span class="fa fa-linkedin"></span>
						<p>/LinkdinUser</p>
					</a>
				</li>
				<li>
					<a href="">
						<span class="fa fa-google-plus"></span>
						<p>/JophaFreddy</p>
					</a>
				</li>
			</ul>
		</div>
		<div class="copyright">
			<p><span class="fa fa-copyright"></span>Jopha Freddy 2017 -  <a href="http://validator.w3.org/check?uri=referer" title="validator W3C" target="_blank">Validé W3C</a></p>
		</div>
	</footer>
</body>
</html>