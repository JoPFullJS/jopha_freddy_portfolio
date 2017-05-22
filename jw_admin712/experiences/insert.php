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

if(isset($_POST['id']) && isset($_POST['entreprise']) && isset($_POST['poste'])){

	$entreprise = htmlentities($_POST['entreprise']);
	$categorie = $_POST['categorie'];
	$periode = htmlentities($_POST['periode']);
	$poste = htmlentities($_POST['poste']);
	$techno = htmlentities($_POST['techno']);
	$env = htmlentities($_POST['env']);
	$mission = htmlentities($_POST['mission']);
	$description = htmlentities($_POST['description']);



    
    $insert_experiences = $connect->prepare("INSERT INTO experiences_pro SET id_cat_exp= :categorie, entreprise= :entreprise, periode= :periode, poste= :poste, techno_poste= :techno, environement= :env, titre_mission= :mission, description= :description");
    $insert_experiences->bindValue('categorie', $categorie, PDO::PARAM_INT);
    $insert_experiences->bindValue('entreprise', $entreprise, PDO::PARAM_STR);
    $insert_experiences->bindValue('periode', $periode, PDO::PARAM_STR);
    $insert_experiences->bindValue('poste', $poste, PDO::PARAM_STR);
    $insert_experiences->bindValue('techno', $techno, PDO::PARAM_STR);
    $insert_experiences->bindValue('env', $env, PDO::PARAM_STR);
    $insert_experiences->bindValue('mission', $mission, PDO::PARAM_STR);
    $insert_experiences->bindValue('description', $description, PDO::PARAM_STR);

    $insert_experiences->execute();

    if($insert_experiences->execute()){
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

	<title>insert experiences</title>
	
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
					<li class="group-desktop"><a href="<?= WEBROOT; ?>jw_admin712/experiences/" title="Expériences" class="white lh-50-pg-25 hover deco select-categorie">Expériences</a></li>
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
		<h2>Inserer un élément</h2>
		<div class="form-content">
			<form id="contact" method="post" action="#"  enctype="multipart/form-data">
				<div class="form-style">
						<label>categorie (Front =1, back=2, UI design=3) :</label>
						<input type="text" name="categorie">
				</div>
				<div class="form-style">
						<label>Entreprise :</label>
						<input type="text" name="entreprise">
				</div>
				<div class="form-style">
						<label>Periode :</label>
						<input type="text" name="periode">
				</div>
				<div class="form-style">
						<label>Poste :</label>
						<input type="text" name="poste">
				</div>
				<div class="form-style">
						<label>Techno poste :</label>
						<input type="text" name="techno">
				</div>
				<div class="form-style">
						<label>Environement :</label>
						<input type="text" name="env">
				</div>
				<div class="form-message">
					<label>Titre mission :</label>
					<textarea name="mission"></textarea>
				</div>
				<div class="form-message">
					<label>Description :</label>
					<textarea name="description"></textarea>
				</div>
				<div class="form-submit">
				<!-- on mettra les info de soumissiona ce niveau pour les requetes ajax -->
					<input class="sub_rn" type="submit" name="envoyer" value="Insert expérience" >
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