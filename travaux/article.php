<?php 
// Fichier constants.php defini les differentes constante d'URI pour divers liens dans mon application.
include '../lib/webroot.php'; 
include '../lib/connect.php';

if(isset($_GET['categorie']) && isset($_GET['titre'])){

	/*------------------------------*/
	$count_categorie = $connect->prepare("
		SELECT  COUNT(c.slug) AS categorie,c.slug AS selected,c.nom AS techno,ct.id_categorie,ct.nom AS universe,ct.slug AS domaine 
		FROM competences AS c 
		LEFT JOIN categories AS ct ON c.id_cat_compet = ct.id_categorie
		WHERE c.slug = :categorie");

		$count_categorie->bindValue('categorie', $_GET['categorie'], PDO::PARAM_STR);
		$count_categorie->execute();
		$count_categorie_fetch = $count_categorie->fetch();

	/*-------------------------------*/
	$count_titre = $connect->prepare("
			SELECT  COUNT(t.slug) AS travail,t.id_travaux 
			FROM travaux AS t 
			WHERE t.slug= :titre");

		$count_titre->bindValue('titre', $_GET['titre'], PDO::PARAM_STR);
		$count_titre->execute();

		$count_titre_fetch = $count_titre->fetch();

	/*On comptabilise plus un en nombre de vues*/

	$connect->exec('UPDATE statistiques SET nb_vue=nb_vue+1 WHERE id_travx_stat= '. $connect->quote($count_titre_fetch['id_travaux']));
 

	if($count_categorie_fetch['categorie'] == 1 && $count_titre_fetch['travail'] == 1){

		/*on selectionne le travail par son slug */
		$travail = $connect->prepare("
			SELECT t.id_travaux,t.id_comp_travx,t.titre,t.slug AS article,t.projet,t.technique,t.fonctionnel,t.source,c.id_cat_compet,c.slug AS categorie,c.nom,ct.id_categorie,ct.slug,cp.id_travx_compteur,cp.mediocre,cp.convenable,cp.bon,cp.tres_bon,cp.excellent,stat.id_travx_stat,stat.nb_vue 
			FROM travaux AS t
			LEFT JOIN competences AS c ON t.id_comp_travx = c.id_competences
			LEFT JOIN categories AS ct ON c.id_cat_compet = ct.id_categorie
			LEFT JOIN compteur AS cp ON t.id_travaux = cp.id_travx_compteur
			LEFT JOIN statistiques AS stat ON t.id_travaux = stat.id_travx_stat
			WHERE t.slug = :titre");

			$travail->bindValue('titre', $_GET['titre'], PDO::PARAM_STR);
			$travail->execute();

			$travail_fetch = $travail->fetch();

		/*on compte lenombre de commentaire de l'article*/
		$count_commentaire = $connect->prepare("
			SELECT COUNT(com.id_travx_com) AS commentaire 
			FROM commentaires AS com 
			WHERE com.id_travx_com = :coms");

			$count_commentaire->bindValue('coms', $travail_fetch['id_travaux'], PDO::PARAM_INT);
			$count_commentaire->execute();

			$count_commentaire_fetch = $count_commentaire->fetch();

		/*On récupère les commentaires*/

		$commentaire = $connect->prepare("
			SELECT id_commentaire, id_travx_com, date, nom, contenu, mail, site_web
			FROM commentaires 
			WHERE id_travx_com = :comment
			ORDER BY date DESC");

			$commentaire->bindValue('comment', $travail_fetch['id_travaux'], PDO::PARAM_INT);
			$commentaire->execute();

			$commentaire_fetch = $commentaire->fetchAll();

		
		/*On recupère la page suivante*/


		/*On recupèrela page précèdante*/
	}
	else{
		header('Location: http://wwww.jophafreddy.fr/error404/');
	}
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="robots" content="index,follow">
	<link rel="icon" type="image/png" href="<?= WEBROOT; ?>img/main/favicon.png" />
	<title><?= $travail_fetch['titre']; ?></title>
	<meta name=" description" content="<?= substr(strip_tags(html_entity_decode($travail_fetch['projet'])), 0, 150); ?>">
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
				<li class="group-desktop ele_list blue-10 <?php if($count_categorie_fetch['domaine'] == "front-end") echo "selection"; ?>"><a href="<?= WEBROOT; ?>travaux/front-end/" title="front End" class="grey blue-10 lh-30-pg-30 deco link_list">Front End</a></li>
				<li class="group-desktop ele_list blue-10 <?php if($count_categorie_fetch['domaine'] == "back-end") echo "selection"; ?>"><a href="<?= WEBROOT; ?>travaux/back-end/" title="Back End" class="grey blue-10 lh-30-pg-30 deco link_list">Back End</a></li>
				<li class="group-desktop ele_list blue-10 <?php if($count_categorie_fetch['domaine'] == "ui-design") echo "selection"; ?>"><a href="<?= WEBROOT; ?>travaux/ui-design/" title="UI Design" class="grey blue-10 lh-30-pg-30 deco link_list">UI Design</a></li>
			</ul>
		</nav>	
	</div>

	<header class="header-main-travaux">

		<div class="header-general">
			<div class="header-cat">
				<p><?= $count_categorie_fetch['techno']; ?></p>
			</div>
			<div class="header-accroche">
				<h1><?= $travail_fetch['titre']; ?></h1>
			</div>
		</div>

		<div class="block-aside article-section">
			<div class="navigation-travaux">
				<nav>
					<ul>
						<li class="rubriques-nav home"><a href="<?= WEBROOT; ?>"><span class="glyphicon glyphicon-home"></span></a></li>
						<li class="rubriques-nav"><a href="<?= WEBROOT; ?>travaux/<?= $count_categorie_fetch['domaine']; ?>/"><?= $count_categorie_fetch['universe']; ?></a></li>
						<li><a href="<?= WEBROOT; ?>travaux/<?= $count_categorie_fetch['domaine']; ?>/<?= $count_categorie_fetch['selected']; ?>/"><?= $count_categorie_fetch['techno']; ?></a></li>
					</ul>
				</nav>
			</div>

			<div class="info-travaux">
				<div class="nb-lecteurs">
					<span class="glyphicon glyphicon-eye-open"></span>
					<div class="dt-lecture">
						<p><?= $travail_fetch['nb_vue']; ?></p><span>Lecturs</span>
					</div>
				</div>
				<div class="nb-comment">
					<span class="glyphicon glyphicon-comment"></span>
					<div class="dt-comment">
						<p><?= $count_commentaire_fetch['commentaire']; ?></p><span>Commentaires</span>
					</div>
				</div>
				<div class="nb-stat">
					<span class="glyphicon glyphicon-stats"></span>
					<div class="dt-stat">
					<?php 
						$total_votes = $travail_fetch['mediocre'] + $travail_fetch['convenable'] + $travail_fetch['bon'] + $travail_fetch['tres_bon'] + $travail_fetch['excellent'];
					 ?>
						<p><?= $total_votes; ?></p><span>Votes</span>
					</div>
				</div>
				<div class="share-travaux">
				<div>
					<?php 
										/*on prend le total des votes*/ 
										$total_votes = $travail_fetch['mediocre'] + $travail_fetch['convenable'] + $travail_fetch['bon'] + $travail_fetch['tres_bon'] + $travail_fetch['excellent'];

										/*On donne un coefficeient de 1 à 5 afin d'avoir la moyenne de chaque bloc de la grille de vote */
										$mediocre = 1;
										$convenable = 2;
										$bon = 3;
										$tres_bon = 4;
										$excellent = 5;

										/*on calcule la moyenne sur 5*/
										$moyenne_mediocre = ($travail_fetch['mediocre'] / $total_votes) * $mediocre;
										$moyenne_convenable = ($travail_fetch['convenable'] / $total_votes) * $convenable;
										$moyenne_bon = ($travail_fetch['bon'] / $total_votes) * $bon;
										$moyenne_tres_bon = ($travail_fetch['tres_bon'] / $total_votes) * $tres_bon;
										$moyenne_excellent = ($travail_fetch['excellent'] / $total_votes) * $excellent;

										/*on fait la somme des 5 bloc du système de vote*/
										$moyenne_generale = $moyenne_mediocre + $moyenne_convenable + $moyenne_bon + $moyenne_tres_bon + $moyenne_excellent;

										/*on exprime la moyenne en pourcentage*/
										$moyenne_en_pourcent = ($moyenne_generale * 100) / 5;

									 ?>
					<p><?= number_format($moyenne_generale, 1); ?><sub>/5</sub></p>
				</div>
				</div>
			</div>

			<div class="navigation-detaille">
				<nav>
					<ul>
						<li class="menu-article"><a href="#projet" class="projet">Introduction</a></li>
						<li class="menu-article"><a href="#env-techn" class="env-techn">Environement technique</a></li>
						<?php if(!empty($travail_fetch['fonctionnel'])){ ?>
						<li class="menu-article"><a href="#comp-fonct" class="comp-fonct">Compétences fonctionnelles</a></li>
						<?php } ?>
						<li class="menu-article"><a href="#sources" class="sources">Sources</a></li>
					</ul>
				</nav>
			</div>	

		</div>

					

	</header>

	<section class="content-travaux article-section">

		<div id="projet">
			<h2>Présentation du projet</h2>
			<div class="titre-souligne"><div class="blue-ligne"></div></div>
			<div class="content-projet">
				<?= html_entity_decode($travail_fetch['projet']); ?>
			</div>
		</div>

		<div id="env-techn">
			<h2>Environement technique</h2>
			<div class="titre-souligne"><div class="blue-ligne"></div></div>
			<div class="content-techn">
				<?php 

						$techniques = explode(',', $travail_fetch['technique']);
				 ?>
				<?php foreach ($techniques as $k => $technique): ?>
					<div class="technos-web">
						<div class="img-technos-web">
							<img src="<?= WEBROOT; ?>img/competences/<?= str_replace(" ", "-", $technique); ?>.png" alt="<?= $technique ?>">
						</div>
						<div class="titre-technos-web"><p><?= $technique; ?></p></div>
					</div>
				<?php endforeach; ?>

			</div>
		</div>

		<div id="comp-fonct">
		<?php if(!empty($travail_fetch['fonctionnel'])){ ?>
		<h2>Compétences fonctionnelles</h2>
			<div class="titre-souligne"><div class="blue-ligne"></div></div>
			<div class="content-fonct">
				<?php 
					$fonctionnels = explode('|', $travail_fetch['fonctionnel']);
				?>
				<?php foreach ($fonctionnels as $k => $fonctionnel): ?>
					<div class="fonctionnel-web">
						<div class="plus-fonct">
							<span class="glyphicon glyphicon-plus"></span>
						</div>
						<div class="description-fonct">
							<p><?= html_entity_decode($fonctionnel); ?></p>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		<?php } ?>
		</div>

		<div id="sources">
			<h2>Vous voulez en voir d'avantage ?</h2>
			<div class="titre-souligne"><div class="blue-ligne"></div></div>
			<div class="content-sources">
			<?php 
					$sources = explode(',', $travail_fetch['source']);
				?>
			<?php foreach ($sources as $k => $source): ?>
				<?php 
					$elements = explode('|', $source);
				?>
				<div class="img-source">
					<a href="<?= $elements[1]; ?>" title="<?= $elements[1]; ?>"><img src="<?= WEBROOT; ?>img/sources/<?= str_replace(" ", "-", $elements[0]); ?>.png" alt="<?= $elements[0]; ?>"></a>
				</div>
			<?php endforeach; ?>

			</div>
		</div>

	</section>

	<section class="satisfaction article-section">
		<h2>Etes-vous satisfait de ce projet ?</h2>
		<div class="titre-souligne"><div class="blue-ligne"></div></div>
		<div class="content-satisfaction">
			<!-- ici on place le module de satisfaction -->
			<div class="error"><p></p></div>
        <div class="content-stat">
          <div class="box">
				<p class="sondage">
					<span class="degre"><?= $travail_fetch['mediocre']; ?></span><span> votes</span>
				</p>
				<p class="travail">
					<span>Médiocre</span>
				</p>
            <div><a href="#" title="Mediocre"><img src="<?= WEBROOT; ?>img/satisfaction/mediocre.png" alt="Mediocre"></a></div>
            <div class="ajout_vote"></div>
          </div>
          <div class="box">
				<p class="sondage">
					<span class="degre"><?= $travail_fetch['convenable']; ?></span><span> votes</span>
				</p>
				<p class="travail">
					<span>Convenable</span>
				</p>
            <div><a href="#" title="Convenable"><img src="<?= WEBROOT; ?>img/satisfaction/convenable.png" alt="Convenable"></a></div>
            <div class="ajout_vote"></div>              
          </div>
          <div class="box">
				<p class="sondage">
					<span class="degre"><?= $travail_fetch['bon']; ?></span><span> votes</span>
				</p>
				<p class="travail">
					<span>Bon</span>
				</p>
            <div><a href="" title="Bon"><img src="<?= WEBROOT; ?>img/satisfaction/bon.png" alt="Bon"></a></div>
            <div class="ajout_vote"></div>      
          </div>
          <div class="box">
	          	<p class="sondage">
	                <span class="degre"><?= $travail_fetch['tres_bon']; ?></span><span> votes</span>
	            </p>
	            <p class="travail">
					<span>Très bon</span>
				</p>
            <div><a href="" title="Tres bon"><img src="<?= WEBROOT; ?>img/satisfaction/tres_bon.png" alt="Tres bon"></a></div>
            <div class="ajout_vote"></div>       
          </div>
          <div class="box">
				<p class="sondage">
					<span class="degre"><?= $travail_fetch['excellent']; ?></span><span> votes</span>
				</p>
				<p class="travail">
					<span>Excellent</span>
				</p>
              <div><a href="" title="Excellent"><img src="<?= WEBROOT; ?>img/satisfaction/excellent.png" alt="Excellent"></a></div>
              <div class="ajout_vote"></div>            
          </div>
        </div>
		</div>
		<div class="stat-evaluation">
			<!-- Le taux de participation pourchaque étiquette -->
		</div>
	</section>

	<section id="commentaires" class="article-section">
		<h2>Laisser un commentaire sur ce projet ?</h2>
		<div class="titre-souligne"><div class="blue-ligne"></div></div>
		<div class="post">
		<?php foreach ($commentaire_fetch as $k => $commentaire): ?>
			<div class="content_post">
				<div class="userinfo">
					<div class="user"><a href="<?= $commentaire['site_web']; ?>"><?= $commentaire['nom']; ?></a></div>
					<?php 
						$affichage = $commentaire['date'];
						$annee=substr($affichage,0,4);
						$mois=ltrim(substr($affichage,5,2), "0");
						$jour=substr($affichage,8,2);
						$heurs=substr($affichage,11,8);

						$calendrier = array("Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Decembre");
					 ?>
					<div class="date"><?= $jour.'  '.$calendrier[$mois].'  '.$annee.'  '.$heurs; ?></div></div>
				<div class="content">
					<div class="message"><p><?= $commentaire['contenu']; ?></p></div>
				</div>
			</div>
		<?php endforeach; ?>
		</div>
		<div class="bloc-commentaire">
			<!-- ici on place le bloc commentaire -->
			<div class="form-content">
				<form id="commentaire" method="post" action="http://jophafreddy.fr/lib/com.php" enctype="multipart/form-data">
					<input class="" type="hidden"  name="article" value="<?= $travail_fetch['id_travaux']; ?>" />
					<div class="form-style">
						<label for="nom">Nom* :</label>
						<input type="text" class="nom" placeholder="Votre nom" name="nom" id="nom" />
						<span class="nom_rn"></span>
					</div>
					<div class="form-style">
						<label for="mail">Mail* :</label>
						<input type="text" class="mail" placeholder="Votre adresse mail" name="mail" id="mail">
						<span class="mail_rn"></span>
					</div>
					<div class="form-style">
						<label for="web">Site web :</label>
						<input type="text" class="url" placeholder="votre site web" name="web" id="web" />
						<span class="url_rn"></span>
					</div>
					<div class="form-message">
						<label for="message">Tapez votre message* :</label>
						<textarea name="message" class="message" placeholder="Tapez votre message..." id="message"></textarea>
					</div>
					<div class="form-submit">
					<!-- on mettra les info de soumissiona ce niveau pour les requetes ajax -->
						<input class="sub_rn" type="submit" name="envoyer" value="envoyer votre commentaire" />
						<span class="form_rn"></span>
					</div>
				</form>
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
<script src="<?= WEBROOT; ?>js/shared/contact.js" ></script>
<script type="text/javascript">
  $(document).ready(function() {

      $('.box').click(function(event) {
          event.preventDefault();

          var article = <?= $travail_fetch['id_travaux']; ?>; //identifiant de l'article
          var numBox = $(this).index();  //on obtient le numero du bloc

          $.ajax({
              type: "POST",
              url: '../../../../lib/satisfaction.php',
              data: {
                article:article,
                id: numBox
              },
              beforeSend: function() {
              },
              success: function(data) {
                //$('#container').append(data);
                // on repond à la première condition du script PHP $count_ip_row['vote'] == 0 donc
                // data.ok == 1
                if(data.ok == 1){
                  
					$('.error').find('p').empty();
					//var plusBox = parseInt(data.val)+1;
					//La réponse de l'objet JSON, nous permet d'actualiser la valeur du bouton
					$('.box').find('p').find('.degre').eq(data.index).html(data.bouton);
					
					$('.box').find('.ajout_vote').eq(data.index).fadeIn(500, function() {
						$(this).addClass('plus');
						$(this).fadeOut(500, function () {
							$(this).removeClass('plus');
						});
					});
					/*$('sel').fadeIn();
					$('sel').fadeOut();*/

                }
                else{

					var erreur = data.error_vote;

					if(erreur == 0){

						$('.error').find('p').empty();

						$('.box').find('p').find('.degre').eq(data.index).html(data.bouton);

						$('.box').find('.ajout_vote').eq(data.index).fadeIn(1000, function() {
							$(this).addClass('plus');
							$(this).fadeOut(1000, function () {
								$(this).removeClass('plus');
							});
						});

						$('.box').find('p').find('.degre').eq(data.last_index).html(data.last_bouton);

						$('.box').find('.ajout_vote').eq(data.last_index).fadeIn(1000, function() {
							$(this).addClass('moins');
							$(this).fadeOut(1000, function () {
								$(this).removeClass('moins');
							});
						});

					}
					else if(erreur == 1){

						$('.error').find('p').html("Veuillez cliqué sur un autre bouton !");
					}
                  
                }
                
              },
              error: function() {

              },
              dataType: "json"
          });
          // $('#container').append('<p> Identifiant box : ' + nbBox + '</p>');
          // $('#container').append('<p> valeur box : ' + valBox + '</p>');


          //console.log('bonjour');
      });

    $(window).on('load',function(){

   		$('.header-general').css('background-image','url(<?= WEBROOT; ?>img/header/<?= $count_categorie_fetch['selected']; ?>.jpg)');

  	});

  });
</script>
<script>
	
</script>
</body>
</html>