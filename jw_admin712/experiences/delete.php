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

if(isset($_POST['numero'])){

	$id = $_POST['numero'];

	if(isset($_GET['numero']))
	{

		$delete_experiences = $connect->prepare("
			DELETE FROM experiences_pro 
			WHERE id_experience= :id");

		$delete_experiences->bindValue('id', $id, PDO::PARAM_INT);

		$delete_experiences->execute();

		if($delete_experiences->execute()){
			setFlash("L'élément à été supprimer succès !", "success");
			header('Location: ../');
		}
		else{
			setFlash("L'élément n'a pas pu être supprimer !", "danger");
			header('Location: ../');
		}

	}

}
if(isset($_GET['numero'])){

	$experiences = $connect->prepare("
			SELECT e.id_experience,e.id_cat_exp,e.entreprise,e.periode,e.poste,e.techno_poste,e.environement,e.titre_mission,e.description
			FROM experiences_pro AS e 
			WHERE e.id_experience = :numero");

	$experiences->bindValue('numero', $_GET['numero'], PDO::PARAM_INT);
	$experiences->execute();

	$experiences_fetch = $experiences->fetch();

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

	<title>delete experiences</title>
	
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
		<div class="insert_element">
			<div class="form-content">
				<form id="contact" method="post" action="<?= WEBROOT; ?>jw_admin712/experiences/delete/<?= $_GET['numero']; ?>/"  enctype="multipart/form-data">
					<div class="form-submit">
					<input class="" type="hidden"  name="numero" value="<?= $_GET['numero']; ?>" />
					<!-- on mettra les info de soumissiona ce niveau pour les requetes ajax -->
						<input class="sub_rn" type="submit" name="envoyer" value="supprimer élément !" >
					</div>
				</form>
			</div>
		</div>
	<section class="qui-suis-je article-section">
	<h2>Suppression de : <?= html_entity_decode($experiences_fetch['poste']); ?></h2>
		<div class="inbox">

				<div class="organisation">
					<div class="name-organisation"><p><?= html_entity_decode($experiences_fetch['entreprise']); ?></p></div>
					<div class="titre-souligne"><div class="black-ligne"></div></div>
					<div class="periode"><p><?= html_entity_decode($experiences_fetch['periode']); ?></p></div>
				</div>

				<div class="poste-environement">
					<div class="poste-occupe">
						<div class="techno-img"><img src="<?= WEBROOT; ?>img/competences/<?= $experiences_fetch['techno_poste']; ?>.png" alt="<?= $experiences_fetch['techno_poste']; ?>"></div>
						<div class="name-poste-occupe"><h3><?= html_entity_decode($experiences_fetch['poste']); ?></h3></div>
					</div>
					<div class="env-travx">
						<h3>Environement technique</h3>
						<div class="lg-env-travx">
							<p><?= html_entity_decode($experiences_fetch['environement']); ?></p>
						</div>
					</div>
				</div>

				<div class="mission">
					<div class="etiquette-mission"><p>Mission :</p></div>
					<div class="detail-mission">
						<p class="titre-mission"><?= html_entity_decode($experiences_fetch['titre_mission']); ?></p>
						<?php
							$list_experience = explode('|', $experiences_fetch['description']);

							foreach ($list_experience as $key => $fonctionnel){
        				echo '<p>- '.html_entity_decode($fonctionnel).'</p>';
         			}
						?>
					</div>

				</div>

				<div class="separateur-exp"></div>

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