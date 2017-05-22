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

$interventions = $connect->prepare("
	SELECT i.id_intervention,i.nom,i.slug,i.utilite,i.description 
	FROM interventions AS i 
	ORDER BY i.id_intervention ASC");

$interventions->execute();

$interventions_fetch =$interventions->fetchAll();
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
	<title>Administration domaines intervention</title>
	
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
						<a href="<?= WEBROOT; ?>jw_admin712/domaines-intervention/" title="Intervention" class="white lh-50-pg-25 hover deco select-categorie" id="services">Interventions</a>			
					</li>
					<li class="group-desktop"><a href="<?= WEBROOT; ?>jw_admin712/services/" title="Services" class="white lh-50-pg-25 hover deco">Services</a></li>
					<li class="group-desktop">
						<a href="<?= WEBROOT; ?>jw_admin712/competences/" title="Compétences" class="white lh-50-pg-25 hover deco" id="blog">Compétences</a>						
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
	<?= flash(); ?>
	<div class="insert_element">
		<a href="<?= WEBROOT; ?>jw_admin712/domaines-intervention/insert/new/">insérer un domaine d'intervention</a>
	</div>
	<section class="qui-suis-je article-section">

		<h2>Domaines d'action</h2>

		<div class="who-action">
			<?php foreach ($interventions_fetch as $k => $intervention): ?>
			<div class="intervention_content">
			<article class="intitule-services table interaction">
				<header>
					<h4><?= html_entity_decode($intervention['nom']); ?></h4>
					<div class="img-poste-dev">
						<img src="<?= WEBROOT; ?>img/intervention/<?= $intervention['slug']; ?>.png" alt="<?= html_entity_decode($intervention['nom']); ?>">
					</div>
				</header>
				<p><?= html_entity_decode($intervention['description']); ?></p>
				<div class="link-travx"><a href="<?= WEBROOT; ?>presentation/domaines-intervention/<?= $intervention['slug']; ?>/" title="<?= html_entity_decode($intervention['nom']); ?>">En savoir plus !</a></div>
				
			</article>
				<div class="update">
					<a href="<?= WEBROOT; ?>jw_admin712/domaines-intervention/<?= $intervention['slug']; ?>/" title="Mettre à jour">Mettre à jour</a>
				</div>
				<div class="delete">
					<a href="<?= WEBROOT; ?>jw_admin712/domaines-intervention/delete/<?= $intervention['id_intervention']; ?>/" title="supprimer">supprimer</a>
				</div>
			</div>
			

			<?php endforeach; ?>
			
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
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="<?= WEBROOT; ?>js/shared/sub_menu.js" ></script>
</body>
</html>