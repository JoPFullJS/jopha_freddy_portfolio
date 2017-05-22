<?php 
// Fichier constants.php defini les differentes constante d'URI pour divers liens dans mon application.
include 'lib/webroot.php'; 
include 'lib/connect.php'; 

		/*on selectionne les travaux qui ont les plus grand nombre de vue*/
		$echantillon = $connect->prepare("
					SELECT t.id_travaux,t.id_comp_travx,t.titre,t.slug AS article,c.id_cat_compet,c.slug AS categorie,c.nom,ct.id_categorie,ct.slug,cp.id_travx_compteur,cp.mediocre,cp.convenable,cp.bon,cp.tres_bon,cp.excellent,stat.id_travx_stat,stat.nb_vue 
					FROM travaux AS t
					LEFT JOIN competences AS c ON t.id_comp_travx = c.id_competences
					LEFT JOIN categories AS ct ON c.id_cat_compet = ct.id_categorie
					LEFT JOIN compteur AS cp ON t.id_travaux = cp.id_travx_compteur
					LEFT JOIN statistiques AS stat ON t.id_travaux = stat.id_travx_stat
					ORDER BY stat.nb_vue DESC
					LIMIT 3");
			
		$echantillon->execute();

		$echantillon_fetch = $echantillon->fetchAll();

		/*on récupère les compétences*/
		$competences = $connect->prepare("
				SELECT c.id_competences,c.id_cat_compet,c.nom,c.slug,c.taux,c.technique_key
				FROM competences AS c
				WHERE c.technique_key = 1
				ORDER BY c.id_cat_compet ASC,c.id_competences ASC");

		$competences->execute();

		$competences_fetch = $competences->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="robots" content="index,follow">
	<link rel="icon" type="image/png" href="<?= WEBROOT; ?>img/main/favicon.png" />
	<title>Jopha Freddy - Développeur - Intégrateur - UI Designer.</title>
	<meta name="description" content="Découvrez mon parcours de développeur Front et lisez les travaux que j'ai réalisés pour démontrer mes compétences."/>
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
		
		<nav class="navigation margin-left-30 visible-lg visible-md">
			<ul class="nav-haut">
				<li class="group-desktop">
					<a href="<?= WEBROOT; ?>presentation/qui-suis-je/" title="Services" class="white lh-50-pg-25 hover deco icon-sub block-sub" id="services">Présentation</a>
						<ul class="survol-services">
							<li><a class="survol-block" href="<?= WEBROOT; ?>presentation/qui-suis-je/" title="Qui suis-je ?">Qui suis-je ?</a></li>
							<li><a class="survol-block" href="<?= WEBROOT; ?>presentation/domaines-intervention/" title="Domaines d'intervention">Domaines d'intervention</a></li>
							<li><a class="survol-block" href="<?= WEBROOT; ?>presentation/mes-services/" title="Mes services">Mes services</a></li>
						</ul>
				</li>
				<li class="group-desktop"><a href="<?= WEBROOT; ?>competences/" title="Compétences" class="white lh-50-pg-25 hover deco">Compétences</a></li>
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
		<div class="social-media visible-lg visible-md">	
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

<header class="header">

	<div class="txt-accroche-home">
		<div class="titre-accroche">
			<p class="one">Jopha Freddy</p>
		</div>
		<div class="titre-competences">
			<h1>Développeur Front-End/Back-End</h1>
		</div>


		<div class="link-comptences">
			<a href="<?= WEBROOT; ?>competences/" title="Compétences" class="lk-competences" >mes compétences</a>
		</div>


		<div class="arrow-down">
			<a href="#quiSuisJe" class="scroll-down"><span class="glyphicon glyphicon-chevron-down"></span></a>
		</div>
	</div>
	

</header>

<section id="quiSuisJe" class="presentation">


	<header>
		<h2 class="general-section">Qui suis-je ?</h2>
		<div class="accroche-presentation">
				<p>Dans mes projets, je cherche la simplicité.</p>
		</div>
	</header>

	<div class="casquettes">

		<article class="poste-dev">
			<header>
				<h3><span>Développeur</span> Front End</h3>
				<div class="img-poste-dev">
					<img src="<?= WEBROOT; ?>img/presentation/front-end.png" alt="Développeur Front End">
				</div>
			</header>
			<p>J'assemble de façon optimale différents éléments <strong>HTML</strong> validés <strong>W3C</strong> et <strong>SEO</strong> qui interagissent avec mes composants <strong>JavaScript</strong>.</p>
		</article>

		<article class="poste-dev">
			<header>
				<h3><span>Dévelopeur</span> Back End</h3>
				<div class="img-poste-dev">
					<img src="<?= WEBROOT; ?>img/presentation/back-end.png" alt="Développeur Back End">
				</div>
			</header>
			<p>Je développe des sites web dymaniques en <strong>PHP</strong> et je gère ma <strong>base de données relationnelles</strong> avec <strong>MySql</strong>.</p>
		</article>

		<article class="poste-dev">
			<header>
				<h3>UI <span>Designer</span></h3>
				<div class="img-poste-dev">
					<img src="<?= WEBROOT; ?>img/presentation/ui-designer.png" alt="Graphiste web">
				</div>
			</header>
			<p>Pour votre <strong></strong> identité sur le web, je crée des <strong>logos</strong>, <strong>chartes graphiques</strong> et <strong>maquettes fonctionnelles</strong> pour un <strong>aspect visuel</strong> et une <strong>expérience utilisateur</strong> optimale.</p>
		</article>

	</div>

	<footer>
		<div class="link-presentation">
			<a href="<?= WEBROOT; ?>presentation/qui-suis-je/" title="Services"><span class="verbus">Connaître</span> mon métier</a>
		</div>
	</footer>

</section>
<section class="travaux">
	<header>
		<h2 class="general-section-white">fontionnalités web</h2>

		<div class="accroche-presentation-white">
				<p>Des modules fontionneles qui répondent à vos besoins.</p>
		</div>
	</header>
	

	<div class="echantillon-travaux">

		<?php foreach ($echantillon_fetch as $k => $echantillon): ?>
		<div class="list-travaux">

			<div class="info-user">
				<div class="image">
					<img src="<?= WEBROOT; ?>img/travaux/etiquettes/<?= $echantillon['article']; ?>.jpg" alt="<?= $echantillon['titre']; ?>">
					<a href="<?= WEBROOT; ?>travaux/front-end/<?= $echantillon['categorie']; ?>/<?= $echantillon['article']; ?>/" title="<?= $echantillon['nom']; ?>" class="info-generales">
						<div class="info-glissante">
							<div class="techno">
								<img src="<?= WEBROOT; ?>img/competences/<?= $echantillon['categorie']; ?>_small.png" alt="<?= $echantillon['nom']; ?>">
							</div>
							<div class="separateur"></div>
							<div class="list-info">
									<div class="nb-vue">
										<div class="icon-vue"><img src="<?= WEBROOT; ?>img/main/picto-vue.png" alt="monbres de vue pour ce travail"></div>
										<div class="info-vue">
											<p class="info1"><strong><?= $echantillon['nb_vue']; ?></strong></p>
											<p class="info2">Lectures</p>
										</div>
									</div>
									<div class="nb-like">
									<?php 
										/*on prend le total des votes*/ 
										$total_votes = $echantillon['mediocre'] + $echantillon['convenable'] + $echantillon['bon'] + $echantillon['tres_bon'] + $echantillon['excellent'];

										/*On donne un coefficeient de 1 à 5 afin d'avoir la moyenne de chaque bloc de la grille de vote */
										$mediocre = 1;
										$convenable = 2;
										$bon = 3;
										$tres_bon = 4;
										$excellent = 5;

										/*on calcule la moyenne sur 5*/
										$moyenne_mediocre = ($echantillon['mediocre'] / $total_votes) * $mediocre;
										$moyenne_convenable = ($echantillon['convenable'] / $total_votes) * $convenable;
										$moyenne_bon = ($echantillon['bon'] / $total_votes) * $bon;
										$moyenne_tres_bon = ($echantillon['tres_bon'] / $total_votes) * $tres_bon;
										$moyenne_excellent = ($echantillon['excellent'] / $total_votes) * $excellent;

										/*on fait la somme des 5 bloc du système de vote*/
										$moyenne_generale = $moyenne_mediocre + $moyenne_convenable + $moyenne_bon + $moyenne_tres_bon + $moyenne_excellent;

										/*on exprime la moyenne en pourcentage*/
										$moyenne_en_pourcent = ($moyenne_generale * 100) / 5;

									 ?>
										<p>Note : <strong><?= number_format($moyenne_generale, 1); ?></strong></p>
										<div class="img-like"><div class="bar-img-like" style="width: <?= number_format($moyenne_en_pourcent, 0); ?>%;"></div></div>
									</div>
							</div>
						</div>
					</a>
				</div>
			</div>

			<header class="titre-travaux">
				<p>
					<a href="<?= WEBROOT; ?>travaux/front-end/<?= $echantillon['categorie']; ?>/<?= $echantillon['article']; ?>/" title="<?= $echantillon['titre']; ?>"><?= $echantillon['titre']; ?></a>
				</p>
			</header>

		</div>
		<?php endforeach; ?>

	</div>

	<footer>
		<div class="link-fonctionnalites">
			<a href="<?= WEBROOT; ?>travaux/front-end/" title="Travaux"><span class="verbus-fc">Lire</span> mes travaux</a>
		</div>
	</footer>

</section>

<section class="competences">
	<header>
		<h2 class="general-section">Mes compétences</h2>

		<div class="accroche-presentation">

			<span></span>
				<p>Quelles compétences puis-je vous apportez aujourd'hui ?</p>
			<span></span>

		</div>
	</header>

	<div class="list-competences mg-left-right mg-section">

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
	<footer>
		<div class="link-competences">
			<a href="<?= WEBROOT; ?>competences/" title="Compétences"><span class="verbus-comp">Voir</span> mes compétences</a>
		</div>
	</footer>

</section>

<footer class="contact">
	<div class="block-contact">
		<h2 class="general-section-white">contacter-moi !</h2>
		<div class="link-contact">
			<a href="<?= WEBROOT; ?>contact/" title="contact" class="lk-contact" >Formulaire de contact</a>
		</div>
	</div>
</footer>

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
</body>
</html>