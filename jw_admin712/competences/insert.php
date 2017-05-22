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

if(isset($_POST['id']) && isset($_POST['competences']) && isset($_POST['slug']) &&isset($_POST['categorie']) && isset($_POST['taux']) && isset($_POST['technique_key']) && isset($_POST['travaux_key']) && isset($_POST['titre']) && isset($_POST['description'])){

	$competences = htmlentities($_POST['competences']);
	$categorie = $_POST['categorie'];
	$slug = $_POST['slug'];
	$taux = $_POST['taux'];
	$technique_key = $_POST['technique_key'];
	$travaux_key = $_POST['travaux_key'];
	$titre = htmlentities($_POST['titre']);
	$description = htmlentities($_POST['description']);
    
    $insert_competences = $connect->prepare("
    	    INSERT INTO competences 
    	    SET id_cat_compet= :categorie, nom= :competence, slug= :slug, taux= :taux, technique_key= :technique, travaux_key= :travaux, titre= :titre, description= :description");

	$insert_competences->bindValue('categorie', $categorie, PDO::PARAM_INT);
	$insert_competences->bindValue('competence', $competences, PDO::PARAM_STR);
	$insert_competences->bindValue('slug', $slug, PDO::PARAM_STR);
	$insert_competences->bindValue('taux', $taux, PDO::PARAM_INT);
	$insert_competences->bindValue('technique', $technique_key, PDO::PARAM_INT);
	$insert_competences->bindValue('travaux', $travaux_key, PDO::PARAM_INT);
	$insert_competences->bindValue('titre', $titre, PDO::PARAM_STR);
	$insert_competences->bindValue('description', $description, PDO::PARAM_STR);

	$insert_competences->execute();

    if($insert_competences->execute()){
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
	<title>Insert competences</title>
	
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
						<a href="<?= WEBROOT; ?>jw_admin712/competences/" title="Compétences" class="white lh-50-pg-25 hover deco select-categorie" id="blog">Compétences</a>						
					</li>
					<li class="group-desktop"><a href="<?= WEBROOT; ?>jw_admin712/experiences/" title="Expériences" class="white lh-50-pg-25 hover deco">Expériences</a></li>
					<li class="group-desktop"><a href="<?= WEBROOT; ?>jw_admin712/travaux/" title="Travaux" class="white lh-50-pg-25 hover deco">Travaux</a></li>
				</ul>
			</nav>
			<div class="logout">	
				<a href="<?= WEBROOT; ?>jw_admin712/login/logout/">Logout</a>
					
			</div>
		</div>
	</header>
	<div style="height: 100px; width: 100%;"></div>
	<section class="qui-suis-je article-section">
		<h2>Insérer un compétence</h2>
		<div class="form-content">
			<form id="contact" method="post" action="#"  enctype="multipart/form-data">				
				<div class="form-style">
						<label>categorie (Front =1, back=2, UI design=3) :</label>
						<input type="text" name="categorie">
				</div>
				<div class="form-style">
						<label>Competences :</label>
						<input type="text" name="competences">
				</div>
				<div class="form-style">
						<label>Slug :</label>
						<input type="text" name="slug">
				</div>
				<div class="form-style">
						<label>Taux :</label>
						<input type="text" name="taux">
				</div>
				<div class="form-style">
						<label>Technique_key :</label>
						<input type="text" name="technique_key">
				</div>
				<div class="form-style">
						<label>Travaux_key :</label>
						<input type="text" name="travaux_key">
				</div>
				<div class="form-style">
						<label>Titre :</label>
						<input type="text" name="titre">
				</div>
				<div class="form-style">
						<label>Description :</label>
						<input type="text" name="description">
				</div>
				<div class="form-submit">
				<!-- on mettra les info de soumissiona ce niveau pour les requetes ajax -->
					<input class="sub_rn" type="submit" name="envoyer" value="Insert compétence">
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