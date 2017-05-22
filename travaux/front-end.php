<?php 
// Fichier constants.php defini les differentes constante d'URI pour divers liens dans mon application.
include '../lib/webroot.php';
include '../lib/connect.php';

if(isset($_GET['domaine'])){

	$count_domaine =  $connect->prepare("
			SELECT  COUNT(c.slug) AS domaine,c.slug,c.nom,c.titre,c.description 
			FROM categories AS c 
			WHERE c.id_categorie = :domaine");

	$count_domaine->bindValue('domaine', $_GET['domaine'], PDO::PARAM_INT);

	$count_domaine->execute();

	$count_domaine_fetch = $count_domaine->fetch();

	if($count_domaine_fetch['domaine'] == 1){
		
		/*on selectionne les travaux qui appartiennent au domaine Front End*/
		$domaine = $connect->prepare("
			SELECT t.id_travaux,t.id_comp_travx,t.titre,t.slug AS article,t.affichage,c.id_cat_compet,c.slug AS categorie,c.nom,ct.id_categorie,ct.slug,cp.id_travx_compteur,cp.mediocre,cp.convenable,cp.bon,cp.tres_bon,cp.excellent,stat.id_travx_stat,stat.nb_vue 
			FROM travaux AS t
			LEFT JOIN competences AS c ON t.id_comp_travx = c.id_competences
			LEFT JOIN categories AS ct ON c.id_cat_compet = ct.id_categorie
			LEFT JOIN compteur AS cp ON t.id_travaux = cp.id_travx_compteur
			LEFT JOIN statistiques AS stat ON t.id_travaux = stat.id_travx_stat
			WHERE ct.id_categorie = :domaine AND t.affichage = 1
			ORDER BY t.id_travaux ASC");
			

			$domaine->bindValue('domaine', $_GET['domaine'], PDO::PARAM_INT);

			$domaine->execute();

			$domaine_fetch = $domaine->fetchAll();

		/*on selectionne les categorie qui appartiennent au doamine Front End*/

		$categories = $connect->prepare("
			SELECT c.nom,c.slug,c.titre 
			FROM competences AS c 
			WHERE c.travaux_key = 1  AND c.id_cat_compet = :domaine 
			ORDER BY c.id_competences ASC");

			$categories->bindValue('domaine', $_GET['domaine'], PDO::PARAM_INT);
			
			$categories->execute();

			$categories_fetch = $categories->fetchAll();


	}
	else{
		/*on redirige vers la page d'ereur*/
		header('Location: http://wwww.jophafreddy.fr/error404/');
	}

}
else{
	/*on redirige vers la page d'ereur*/
	header('Location: http://wwww.jophafreddy.fr/error404/');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="robots" content="index,follow">
	<link rel="icon" type="image/png" href="<?= WEBROOT; ?>img/main/favicon.png" />
	<meta name=" description" content="<?= $count_domaine_fetch['description']; ?>">
	<title><?= $count_domaine_fetch['titre']; ?></title>
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
							
							<li class="ele-sub-menu"><a href="<?= WEBROOT; ?>travaux/front-end/" title="Front End">Frond End</a></li>
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
					<a href="<?= WEBROOT; ?>travaux/front-end/" title="Travaux" class="white lh-50-pg-25 select-categorie deco icon-sub block-sub" >Travaux</a>
						<ul class="survol-blog">
							
							<li><a class="survol-block" href="<?= WEBROOT; ?>travaux/front-end/" title="Front End">Frond End</a></li>
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
		<nav class="navigation menu-blog margin-left-130">
			<ul>
				<li class="group-desktop ele_list blue-10 selection"><a href="<?= WEBROOT; ?>travaux/front-end/" title="front End" class="grey blue-10 lh-30-pg-30 deco link_list">Front End</a></li>
				<li class="group-desktop ele_list blue-10"><a href="<?= WEBROOT; ?>travaux/back-end/" title="Back End" class="grey blue-10 lh-30-pg-30 deco link_list">Back End</a></li>
				<li class="group-desktop ele_list blue-10"><a href="<?= WEBROOT; ?>travaux/ui-design/" title="UI Design" class="grey blue-10 lh-30-pg-30 deco link_list">UI Design</a></li>
			</ul>
		</nav>	
	</div>

	<header class="header-main-travaux header-general">
		<div class="header-cat">
			<p>Travaux</p>
		</div>
		<div class="header-accroche">
			<h1><?= $count_domaine_fetch['titre']; ?></h1>
		</div>
	</header>

	<div class="page-travaux article-section">

		<div class="filter-categories">
			<div class="je-filtre"><p>Selectionner une compétence :</p></div>
			<div class="choix-categorie">
				<select id="list-choix">
					<option value="<?= $count_domaine_fetch['slug']; ?>">Travaux <?= $count_domaine_fetch['nom']; ?></option>
					<?php foreach ($categories_fetch as $k => $categorie): ?>
					<option value="<?= $categorie['slug']; ?>"><?= $categorie['nom']; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>

		<div class="group-travaux">
		
		<?php foreach ($domaine_fetch as $k => $domaine): ?>
		<div class="list-travaux">

			<div class="info-user">
				<div class="image">
					<img src="<?= WEBROOT; ?>img/travaux/etiquettes/<?= $domaine['article']; ?>.jpg" alt="<?= $domaine['titre']; ?>">
					<a href="<?= WEBROOT; ?>travaux/front-end/<?= $domaine['categorie']; ?>/<?= $domaine['article']; ?>/" title="<?= $domaine['nom']; ?>" class="info-generales">
						<div class="info-glissante">
							<div class="techno">
								<img src="<?= WEBROOT; ?>img/competences/<?= $domaine['categorie']; ?>_small.png" alt="<?= $domaine['nom']; ?>">
							</div>
							<div class="separateur"></div>
							<div class="list-info">
									<div class="nb-vue">
										<div class="icon-vue"><img src="<?= WEBROOT; ?>img/main/picto-vue.png" alt="monbres de vue pour ce travail"></div>
										<div class="info-vue">
											<p class="info1"><strong><?= $domaine['nb_vue']; ?></strong></p>
											<p class="info2">Lectures</p>
										</div>
									</div>
									<div class="nb-like">
									<?php 
										/*on prend le total des votes*/ 
										$total_votes = $domaine['mediocre'] + $domaine['convenable'] + $domaine['bon'] + $domaine['tres_bon'] + $domaine['excellent'];

										/*On donne un coefficeient de 1 à 5 afin d'avoir la moyenne de chaque bloc de la grille de vote */
										$mediocre = 1;
										$convenable = 2;
										$bon = 3;
										$tres_bon = 4;
										$excellent = 5;

										/*on calcule la moyenne sur 5*/
										$moyenne_mediocre = ($domaine['mediocre'] / $total_votes) * $mediocre;
										$moyenne_convenable = ($domaine['convenable'] / $total_votes) * $convenable;
										$moyenne_bon = ($domaine['bon'] / $total_votes) * $bon;
										$moyenne_tres_bon = ($domaine['tres_bon'] / $total_votes) * $tres_bon;
										$moyenne_excellent = ($domaine['excellent'] / $total_votes) * $excellent;

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
					<a href="<?= WEBROOT; ?>travaux/front-end/<?= $domaine['categorie']; ?>/<?= $domaine['article']; ?>/" title="<?= $domaine['titre']; ?>"><?= $domaine['titre']; ?></a>
				</p>
			</header>

		</div>
		<?php endforeach; ?>


	</div>
	</div>


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

   		$('.header-general').css('background-image','url(<?= WEBROOT; ?>img/header/<?= $count_domaine_fetch['slug']; ?>.jpg)');

  	});
</script>
</body>
</html>