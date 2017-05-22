<?php 
// Fichier constants.php defini les differentes constante d'URI pour divers liens dans mon application.
include 'lib/webroot.php'; 
include 'lib/connect.php';

/*------------------------------*/
$nb_travaux = $connect->prepare("
	SELECT c.nom,c.slug,c.id_categorie,COUNT(t.id_cat_travx) AS travaux
	FROM categories AS c
	LEFT JOIN travaux AS t ON c.id_categorie = t.id_cat_travx
	WHERE t.affichage = 1
	GROUP BY c.nom
	ORDER BY c.id_categorie ASC");

$nb_travaux->execute();

$nb_travaux_fetch = $nb_travaux->fetchAll();

/*--------------------------------*/
$competences = $connect->prepare("
	SELECT c.id_competences,c.id_cat_compet,c.nom,c.slug,c.taux,c.technique_key
	FROM competences AS c
	WHERE c.technique_key = 1
	ORDER BY c.id_cat_compet ASC,c.id_competences ASC");

$competences->execute();

$competences_fetch = $competences->fetchAll();

/*-------------------------------*/
$expereiences = $connect->prepare("
	SELECT e.id_experience,e.entreprise,e.periode,e.poste,e.techno_poste,e.environement,e.titre_mission,e.description
	FROM experiences_pro AS e
	ORDER BY e.id_experience ASC");

$expereiences->execute();

$expereiences_fetch = $expereiences->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="robots" content="index,follow">
	<link rel="icon" type="image/png" href="<?= WEBROOT; ?>img/main/favicon.png" />
	<title>Jopha Freddy - Quelles compétences puis-je vous apportez ?</title>
	<meta name="description" content="Développeur Front-End, Webdesigner ou développpeur PHP, je suis motivé et prêt à bossé"/>
	<meta name="author" content="Jopha Freddy"/>
	<link rel="stylesheet" href="<?= WEBROOT; ?>bootstrap/css/bootstrap.css">
	<!-- utilisation des glyphicon social media -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= WEBROOT; ?>css/devices.css" type="text/css" >

	


<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-98277172-1', 'auto');
  ga('send', 'pageview');

</script>	
</head>
<body>
<div class="background-mobile"></div>
<!-- Menu pour les mobiles -->
<header class="menu-mobile">

		<div class="group-mobile-reseaux">
		<div class="chapeau">
			<div id="cross">
				<span class="haut"></span>
				<span class="bas"></span>
			</div>
			
			<div id="logo-menu-mobile">
				<a href="<?= WEBROOT; ?>" title="Jopha Freddy"><img src="<?= WEBROOT; ?>img/main/jophafreddy.png" alt="Jopha Freddy"></a>
			</div>
		</div>
			<nav class="mobile">
				<ul>
					<li class="group-mobile">
						<a href="<?= WEBROOT; ?>presentation/qui-suis-je/" title="Services" id="services-mobile" class="main-categorie icon-sub-mobile">Présentation</a>
						<ul class="services-mobile-sub entity-sub-menu">
							<li class="ele-sub-menu"><a href="<?= WEBROOT; ?>presentation/qui-suis-je/" title="Qui suis-je ?">Qui suis-je ?</a></li>
							<li class="ele-sub-menu"><a href="<?= WEBROOT; ?>presentation/domaines-intervention/" title="Domaines d'intervention">Domaines d'intervention</a></li>
							<li class="ele-sub-menu"><a href="<?= WEBROOT; ?>presentation/mes-services/" title="Mes services">Mes services</a></li>
						</ul>
					</li>
					<li class="group-mobile"><a href="<?= WEBROOT; ?>competences/" title="Comptétences" class="main-categorie">Compétences</a></li>
					<li class="group-mobile">
						<a href="<?= WEBROOT; ?>travaux/front-end/" title="Travaux" id="blog-mobile" class="main-categorie icon-sub-mobile">Travaux</a>
						<ul class="blog-mobile-sub entity-sub-menu">
							
							<li class="ele-sub-menu"><a href="<?= WEBROOT; ?>travaux/front-end/" title="Front End">Front End</a></li>
							<li class="ele-sub-menu"><a href="<?= WEBROOT; ?>travaux/back-end/" title="Back End">Back End</a></li>
							<li class="ele-sub-menu"><a href="<?= WEBROOT; ?>travaux/ui-design/" title="UI Design">UI Design</a></li>
						</ul>
					</li>
					<li class="group-mobile"><a href="<?= WEBROOT; ?>contact/" title="Contact" class="main-categorie">Contact</a></li>
				</ul>
			</nav>
			<div class="reseaux">
				<ul>
					<li><a href="https://github.com/JoPFullJS" title="GitHub" target="_blank" class="icon-github"><span>GitHub</span></a></li>
					<li><a href="https://fr.pinterest.com/jophalupi/travaux-ui-design-jophafreddyfr/" title="Pinterest" target="_blank" class="icon-pinterest"><span>Pinterest</span></a></li>
					<li><a href="https://www.linkedin.com/in/freddy-jopha-0ab100126/" title="Linkedin" target="_blank" class="icon-linkedin"><span>Linkedin</span></a></li>
					<li><a href="https://plus.google.com/u/0/108879394740210706761" title="Google Plus" target="_blank" class="icon-google"><span>Google +</span></a></li>
				</ul>
			</div>
		<div style="clear: both; height: 10px;"></div>
		</div>
		
	</header> 

<!-- Menu pour les navigateurs -->
<header class="menu-desktop">
	<div class="container-fluid">
		<div id="hamburger">
			<span class="top"></span>
			<span class="middle"></span>
			<span class="bottom"></span>
		</div>
		<div id="logo-jw">
			<a href="<?= WEBROOT; ?>" title="Jopha Freddy"><img src="<?= WEBROOT; ?>img/main/jophafreddy.png" alt="Jopha Freddy"></a>
		</div>
		
		<nav class="navigation margin-left-30 visible-lg visible-md visible-sm">
			<ul class="nav-haut">
				<li class="group-desktop">
					<a href="<?= WEBROOT; ?>presentation/qui-suis-je/" title="Services" class="white lh-50-pg-25 hover deco icon-sub block-sub" id="services">Présentation</a>
						<ul class="survol-services">
							<li><a class="survol-block" href="<?= WEBROOT; ?>presentation/qui-suis-je/" title="Qui suis-je ?">Qui suis-je ?</a></li>
							<li><a class="survol-block" href="<?= WEBROOT; ?>presentation/domaines-intervention/" title="Domaines d'intervention">Domaines d'intervention</a></li>
							<li><a class="survol-block" href="<?= WEBROOT; ?>presentation/mes-services/" title="Mes services">Mes services</a></li>
						</ul>
				</li>
				<li class="group-desktop"><a href="<?= WEBROOT; ?>competences/" title="Compétences" class="white lh-50-pg-25 select-categorie deco">Compétences</a></li>
				<li class="group-desktop">
					<a href="<?= WEBROOT; ?>travaux/front-end/" title="Travaux" class="white lh-50-pg-25 hover deco icon-sub block-sub" id="blog">Travaux</a>
						<ul class="survol-blog">
							
							<li><a class="survol-block" href="<?= WEBROOT; ?>travaux/front-end/" title="front End">Front End</a></li>
							<li><a class="survol-block" href="<?= WEBROOT; ?>travaux/back-end/" title="Back End">Back End</a></li>
							<li><a class="survol-block" href="<?= WEBROOT; ?>travaux/ui-design/" title="UI Design">UI Design</a></li>
						</ul>
				</li>
				<li class="group-desktop"><a href="<?= WEBROOT; ?>contact/" title="Contact" class="white lh-50-pg-25 hover deco">Contact</a></li>
			</ul>
		</nav>
		<div class="social-media visible-lg visible-md visible-sm">	
			<a href="" class="icon-share"><img src="<?= WEBROOT; ?>img/main/share-icon.png" alt="social media"></a>
				<ul class="block-share">
					<li><a href="https://github.com/JoPFullJS" title="GitHub" target="_blank" class="share-desk share-desk-top icon-github"><span>GitHub</span></a></li>
					<li><a href="https://fr.pinterest.com/jophalupi/travaux-ui-design-jophafreddyfr/" title="Pinterest" target="_blank" class="share-desk icon-pinterest"><span>Pinterest</span></a></li>
					<li><a href="https://www.linkedin.com/in/freddy-jopha-0ab100126/" title="Linkedin" target="_blank" class="share-desk icon-linkedin"><span>Linkedin</span></a></li>
					<li><a href="https://plus.google.com/u/0/108879394740210706761" title="Google Plus" target="_blank" class="share-desk share-desk-bottom icon-google"><span>Google +</span></a></li>
				</ul>
		</div>
	</div>
</header>

<section id="conteneur">

	<header class="header-competences header-general">
		<div class="header-cat">
			<p>Compétences</p>
		</div>
		<div class="header-accroche">
			<h1>Quelles compétences puis-je vous apporter ?</h1>
		</div>

	</header>
	<section class="article-competences article-section">
	
		<div class="link_cv">
			<a href="https://drive.google.com/file/d/0B-h1w_O9Ak36NHgxT0dYQVpjclk/view?usp=sharing" title="Mon C.V en PDF" target="_blank">Mon C.V en PDF</a>
		</div>
		<h2>Mes Compétences fonctionnelles</h2>
		<div class="titre-souligne"><div class="blue-ligne"></div></div>

		<div class="list-fonctionnelle">
			<?php foreach ($nb_travaux_fetch as $k => $travaux_list): ?>
			<article>
				<header>
					<div class="cat-travx"><h3>Travaux<br><?= $travaux_list['nom']; ?></h3></div>
					<div class="nb-travx"><p><?= sprintf("%02d", $travaux_list['travaux']); ?></p></div>
				</header>
				<div class="link-travx"><a href="<?= WEBROOT; ?>travaux/<?= $travaux_list['slug']; ?>/" title="Accès <?= $travaux_list['nom']; ?>">Voir mes travaux</a></div>
			</article>
			<?php endforeach; ?>
	
		</div>


		<h2>Mes compétences techniques</h2>
		<div class="titre-souligne"><div class="blue-ligne"></div></div>

		<div class="list-competences">

		<!-- voici un bloc tyle pour mes compétences -->
			<?php foreach ($competences_fetch as $k => $competence): ?>
			<div class="block-competences">
				
				<div class="icon-competences">
					<img src="<?= WEBROOT; ?>img/competences/<?= $competence['slug']; ?>.png" alt="<?= $competence['nom']; ?>">
				</div>
				<div class="info-competences">
					<div class="name-competences"><span><?= $competence['nom']; ?></span></div>
					<div class="barre-competences">
						<div class="niveau-html"><div class="graduation" style="width: <?= $competence['taux']; ?>%;"></div></div>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
			
		</div>

			
			<h2>Mes expériences professionnelles</h2>
			<div class="titre-souligne"><div class="blue-ligne"></div></div>

			<?php foreach ($expereiences_fetch as $k => $experience): ?>
			<div class="inbox">

				<div class="organisation">
					<div class="name-organisation"><p><?= html_entity_decode($experience['entreprise']); ?></p></div>
					<div class="titre-souligne"><div class="black-ligne"></div></div>
					<div class="periode"><p><?= html_entity_decode($experience['periode']); ?></p></div>
				</div>

				<div class="poste-environement">
					<div class="poste-occupe">
						<div class="techno-img"><img src="<?= WEBROOT; ?>img/competences/<?= $experience['techno_poste']; ?>.png" alt="<?= $experience['techno_poste']; ?>"></div>
						<div class="name-poste-occupe"><h3><?= html_entity_decode($experience['poste']); ?></h3></div>
					</div>
					<div class="env-travx">
						<h3>Environement technique</h3>
						<div class="lg-env-travx">
							<p><?= html_entity_decode($experience['environement']); ?></p>
						</div>
					</div>
				</div>

				<div class="mission">
					<div class="etiquette-mission"><p>Mission :</p></div>
					<div class="detail-mission">
						<p class="titre-mission"><?= html_entity_decode($experience['titre_mission']); ?></p>
						<?php
							$list_experience = explode('|', $experience['description']);

							foreach ($list_experience as $key => $fonctionnel){
        				echo '<p>- '.html_entity_decode($fonctionnel).'</p>';
         			}
						?>
					</div>

				</div>

				<div class="separateur-exp"></div>

			</div>
			<?php endforeach; ?>

	</section>


</section>

<footer class="footer">
	<div class="arrow-up">
		<a href="#conteneur" title="Retour en haut" class="scroll-up"><span class="glyphicon glyphicon-chevron-up"></span></a>
	</div>
	<div class="footer-social-media">
		<ul class="block-social">
			<li>
				<a href="https://github.com/JoPFullJS" title="GitHub" target="_blank">
					<span class="fa fa-github"></span>
					<p>/JoPFullJS</p>
				</a>
			</li>
			<li>
				<a href="https://fr.pinterest.com/jophalupi/travaux-ui-design-jophafreddyfr/" title="Pinterest" target="_blank">
					<span class="fa fa-pinterest"></span>
					<p>/JophaLupi</p>
				</a>
			</li>
			<li>
				<a href="https://www.linkedin.com/in/freddy-jopha-0ab100126/" title="Linkedin" target="_blank">
					<span class="fa fa-linkedin"></span>
					<p>/freddy-jopha</p>
				</a>
			</li>
			<li>
				<a href="https://plus.google.com/u/0/108879394740210706761" title="Google Plus" target="_blank">
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
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>	
<script src="<?= WEBROOT; ?>js/shared/sub_menu.js" ></script>
<script>
	$(window).on('load',function(){

   		$('.header-general').css('background-image','url(<?= WEBROOT; ?>img/header/competences.jpg)');

  	});
</script>
</body>
</html>