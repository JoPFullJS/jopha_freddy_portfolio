<?php 
// Fichier constants.php defini les differentes constante d'URI pour divers liens dans mon application.
include '../lib/webroot.php'; 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="robots" content="index,follow">
	<link rel="icon" type="image/png" href="<?= WEBROOT; ?>img/main/favicon.png" />
	<title>Jopha Freddy - Faisons connaissance.</title>
	<meta name="description" content="Je suis polyvalent. Voici les postes que je pourrais occuper"/>
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
					<a href="<?= WEBROOT; ?>presentation/qui-suis-je/" title="Services" class="white lh-50-pg-25 select-categorie deco icon-sub block-sub">Présentation</a>
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

	<div class="list-sub-menu visible-lg visible-md visible-sm">
		<nav class="navigation menu-services margin-left-130">
			<ul>
				<li class="group-desktop ele_list blue-10 selection"><a href="<?= WEBROOT; ?>presentation/qui-suis-je/" title="Qui suis-je ?" class="grey blue-10 lh-30-pg-30 deco link_list">Qui suis-je ?</a></li>
				<li class="group-desktop ele_list blue-10"><a href="<?= WEBROOT; ?>presentation/domaines-intervention/" title="Domaines d'intervention" class="grey blue-10 lh-30-pg-30 deco link_list">Domaines d'intervention</a></li>
				<li class="group-desktop ele_list blue-10"><a href="<?= WEBROOT; ?>presentation/mes-services/" title="Services" class="grey blue-10 lh-30-pg-30 deco link_list">Mes services</a></li>
			</ul>
		</nav>
	</div>

	<header class="header-main-services header-general">
		<div class="header-cat">
			<p>Présentation</p>
		</div>
		<div class="header-accroche">
			<h1>Qui suis-je ?</h1>
		</div>
	</header>

	<section class="qui-suis-je article-section">
		
		<h2>Qui suis-je ?</h2>
		<div class="titre-souligne"><div class="blue-ligne"></div></div>

		<div class="who-info">
			
			<div class="sub-title-present">
				<h3>En bref...</h3>
				<div class="sub-titre-souligne"><div class="black-ligne"></div></div>
			</div>

			<div class="identite">
				<img src="<?= WEBROOT; ?>img/presentation/presentation.png" alt="Icon identite">
			</div>

			<div class="parcours-presentation">
				<p class="fred-Iam">JOPHA FREDDY</p>
				<p class="entre-deux">je suis avant tout,</p>
				<p class="dev-domaine">Développeur Front End</p>
				<p class="entre-deux">ensuite</p>
				<p class="dev-domaine">UI Designer</p>
				<p class="entre-deux">et enfin,</p>
				<p class="dev-domaine">Développeur Back end.</p>
				<p>Issu d'un parcours d'apprentissage autodidacte, j'ai voulu une approche plus académique à la conception d'une application web.</p>
				<p>Je me suis tourné vers une formation diplômante agréée par l'état comme développeur d'applications multimédias (Bac+2) à l'<a href="http://www.doranco.fr/formation-continue/developpement-web-mobile-3/parcours-developpeur-applications-multimedia-97">école Doranco</a>.</p>
				<p>J'ai réalisé ce site web pour valider ce diplôme et également pour montrer et démontrer à travers mes divers travaux que je suis capable comme un autre d'occuper un poste de développeur Front End / Back End ou d'UI designer.</p>
				<p>Je suis toujours à la recherche de nouvelles opportunités en CDI, CDD, Intérim ou bien encore d'une évolution par un contrat d'alternance.</p>
				<p class="imp">Je ne souhaite pas de poste en freelance.</p>
				<p>Je suis à votre disposition pour un premier contact dans le cadre d'une future opportunité d'affaire.</p>
			</div>

		</div>
		<div class="who-info">
			
			<div class="sub-title-present">
				<h3>Qu'est-ce qu'un developpeur Front End (Intégrateur Web) ?</h3>
				<div class="sub-titre-souligne"><div class="black-ligne"></div></div>
			</div>

			<div class="info-identite">
				<img src="<?= WEBROOT; ?>img/presentation/front-end.png" alt="Développeur Front End">
			</div>

			<div class="parcours-objectif">
			
				<p>Le <strong>développeur front</strong> end comme son nom l'indique, travail sur la parti d'une application web <strong>visible par l'utilisateur</strong> (boutons, champs de saisi, navigation, textes et images).</p>

				<p>Pour ce faire, il doit transposer les <strong>maquettes fonctionnelles</strong> fournies par l'<strong>UI designer</strong> et assembler les éléments et ressources multimédias dans le respect d'un cahier des charges réaliser par un chef de projet.</p>

				<p><strong>HTML, CSS et javascritp</strong> sont les différents langages utilisés pour mettre en pages les composants et fonctionnalités du site web et le faire interagir avec les futurs utilisateurs.</p>

				<p>Le développeur front end est de ce fait la jonction en l'UI designer qui founit le visuel et le back-office qui organise les données de façon structurées (SGBDR) afin de fournir le front, par un système de requête ou d'un <strong>API Rest</strong>, qui aura donc accès au ressources <strong>(URIs, hyperliens, textes, données diverses)</strong>.</p>

				<p>Ce travail minutieux doit se faire dans le respect des <strong>normes d'accessibilité</strong>, de <strong>référencement SEO</strong> et d'<strong>ergonomie</strong> afin d'améliorer la qualité et l'utilité du site.</p>

				<p>Le résultat final doit cependant être compatible avec les différents navigateurs (Firefox, Internet Explorer, Safari…) et également optimiser sur les différents types de périphérique (tablettes, smartphones, desktops et imprimantes).</p>
			</div>

		</div>
		<div id="back-end" class="who-info">
			
			<div class="sub-title-present">
				<h3>Qu'est-ce qu'un developpeur Back End ?</h3>
				<div class="sub-titre-souligne"><div class="black-ligne"></div></div>
			</div>

			<div class="info-identite">
				<img src="<?= WEBROOT; ?>img/presentation/back-end.png" alt="Développeur Back End">
			</div>

			<div class="parcours-objectif">
				<p>Le développeur Back End est avant tout un technicien ou ingénieur qui, à l'aide d'un cahier des charges, va programmer les fonctionnalités d'une application web afin de répondre au besoin du client.</p>

				<p>Le developpeur Back end travaille sur la parti invisible d'un projet web, le back-office ou il s'occupe de la configuration, du développement et de la mainteneance du serveur de la base de données et prend en charge la mise en place et le deploiement de l'application web.</p>

				<p>Le développeur que je suis est familier avec PHP et SQL néanmoins je n'utilise pas de framework tel que symphony, zend ou encore Cake PHP dans mes projet, pour le moment...</p>
			</div>

		</div>
		<div class="who-info">
			
			<div class="sub-title-present">
				<h3>Qu'est-ce qu'un UI designer (Web Designer) ?</h3>
				<div class="sub-titre-souligne"><div class="black-ligne"></div></div>
			</div>

			<div class="info-identite">
				<img src="<?= WEBROOT; ?>img/presentation/ui-designer.png" alt="Graphiste web">
			</div>

			<div class="parcours-objectif">

			<p>L'UI designer comme son nom l'indique est en charge de la réalisation et de la conception d'<strong>interface utilisateur</strong>, il doit donc tenir compte des contraintes liées au nouvelles technologies mais aussi à celles lier à l'utilisateur tout en respectant l' identité visuelle du client avec lequel il doit valider une <strong>maquette fonctionnelle</strong> du produit à livrer.</p>

			<p>En effet, il est en charge de la construction des interfaces des applications et sites web en tenant compte des différents devices (<strong>tablette</strong>, <strong>smartphone</strong>...) pour une application <strong>responsive design</strong>.</p>
			<p>De plus l'interaction que l'utilisateur peut avoir avec ses nouvelles technologies favorise l'expérience utilisateur (navigation tactile, rotation portrait et paysage, les zones d'action et la vocalisation).</p>

			<p>Son rôle est de faciliter au mieux le parcours de l'utilisateur en imaginant une navigation claire, <strong>une accessibilité simple</strong> au contenu, il peut aussi <strong>optimiser son parcours</strong> et le <strong>rendre utilie</strong> avec une <strong>ergonomie</strong> au service de l'<strong>expérience utilisateur</strong>.</p>

			<p>L'UI designer doit rester objectif sur l'efficacité de ces choix en organisant ses différents elements sur la base de <strong>normes techniques</strong> afin notamment de <strong>faciliter le découpage et l'intégration de ces maquettes par un développeur FrontEnd</strong>.</p>
			</div>

		</div>

		
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

   		$('.header-general').css('background-image','url(<?= WEBROOT; ?>img/header/qui-suis-je.jpg)');

  	});
</script>

</body>
</html>