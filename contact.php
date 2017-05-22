<?php 
// Fichier constants.php defini les differentes constante d'URI pour divers liens dans mon application.
include 'lib/webroot.php'; 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="robots" content="index,follow">
	<link rel="icon" type="image/png" href="<?= WEBROOT; ?>img/main/favicon.png" />
	<title>Jopha Freddy - Puis-je vous aider ?</title>
	<meta name="description" content="Laissez-moi un message si vous êtes intéréssé par un partenariat sur le long terme avec un jeune diplômé."/>
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
				<li class="group-desktop"><a href="<?= WEBROOT; ?>competences/" title="Compétences" class="white lh-50-pg-25 hover deco">Compétences</a></li>
				<li class="group-desktop">
					<a href="<?= WEBROOT; ?>travaux/front-end/" title="Travaux" class="white lh-50-pg-25 hover deco icon-sub block-sub" id="blog">Travaux</a>
						<ul class="survol-blog">
							
							<li><a class="survol-block" href="<?= WEBROOT; ?>travaux/front-end/" title="front End">Front End</a></li>
							<li><a class="survol-block" href="<?= WEBROOT; ?>travaux/back-end/" title="Back End">Back End</a></li>
							<li><a class="survol-block" href="<?= WEBROOT; ?>travaux/ui-design/" title="UI Design">UI Design</a></li>
						</ul>
				</li>
				<li class="group-desktop"><a href="<?= WEBROOT; ?>contact/" title="Contact" class="white lh-50-pg-25 select-categorie deco">Contact</a></li>
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

	<header class="header-contact header-general">
		<div class="header-cat">
			<p>Contact</p>
		</div>
		<div class="header-accroche">
			<h1>Puis-je vous aider ?</h1>
		</div>

	</header>
	<section class="article-contact article-section">
		<div>
			<h2>Vous avez des questions ?</h2>
			<div class="titre-souligne"><div class="blue-ligne"></div></div>
		</div>
		
		<div class="form-content">
			<form id="contact" method="post" action="http://jophafreddy.fr/lib/mail.php" enctype="multipart/form-data">
				
				<span class="form_rn"></span>
				<div class="form-left">
					<div class="form-style">
						<label for="nom">Nom* :</label>
						<input type="text" class="nom" placeholder="Votre nom" name="nom" id="nom" />
						<span class="nom_rn"></span>
					</div>
					<div class="form-style">
						<label for="prenom">Prénom* :</label>
						<input type="text" class="prenom" placeholder="Votre prénom" name="prenom" id="prenom" />
						<span class="prenom_rn"></span>
					</div>
				</div>

				<div class="form-right">
					<div class="form-style">
						<label for="mail">Mail* :</label>
						<input type="email" class="mail" placeholder="Votre adresse mail" name="mail" id="mail">
						<span class="mail_rn"></span>
					</div>
					<div class="form-style">
						<label for="telephone">Téléphone :</label>
						<input type="tel" class="telephone" placeholder="Téléphone" name="telephone" id="telephone">
						<span class="telephone_rn"></span>
					</div>
				</div>
				<div class="form-style clear">
						<label for="web">Site web :</label>
						<input type="url" class="url" placeholder="Votre site web" name="web" id="web">
						<span class="url_rn"></span>
					</div>
				<div class="form-message">
					<label for="message">Tapez votre message* : (Votre message est limité à 500 caratères !)</label>
					<span class="message_rn"></span>
					<textarea name="message" class="message" placeholder="Tapez votre message..." id="message"></textarea>
				</div>
				<div class="form-submit">
				<!-- on mettra les info de soumissiona ce niveau pour les requetes ajax -->
					<input class="sub_rn" type="submit" name="envoyer" value="Soumettre" />
					<span class="form_rn"></span>
				</div>

			</form>
			<div style=" margin-top:15px;"><p class="good_form" style="text-align:center;"></p><br /><p class="redir" style="text-align:center;" ></p></div>
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
<script src="<?= WEBROOT; ?>js/shared/contact.js" ></script>
<script>
	$(window).on('load',function(){

   		$('.header-general').css('background-image','url(<?= WEBROOT; ?>img/header/contact.jpg)');

  	});
</script>
</body>
</html>