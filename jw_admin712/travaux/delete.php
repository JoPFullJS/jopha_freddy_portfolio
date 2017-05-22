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

if(isset($_POST['id'])){

	$id = $_POST['id'];

  if(isset($_GET['titre']))
  {


    $delete_compteur = $connect->prepare("DELETE FROM compteur WHERE id_travx_compteur= :id");

    $delete_compteur->bindValue('id', $id, PDO::PARAM_INT);

    $delete_compteur->execute();


    $delete_statistique = $connect->prepare("DELETE FROM statistiques WHERE id_travx_stat= :id");

    $delete_statistique->bindValue('id', $id, PDO::PARAM_INT);

    $delete_statistique->execute();
    

    $delete_vote = $connect->prepare("DELETE FROM vote_ip WHERE id_travx_vote= :id");

    $delete_vote->bindValue('id', $id, PDO::PARAM_INT);

    $delete_vote->execute();


    $delete_travaux = $connect->prepare("DELETE FROM travaux WHERE id_travaux= :id");

    $delete_travaux->bindValue('id', $id, PDO::PARAM_INT);

    $delete_travaux->execute();


    if($delete_travaux->execute()){
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

	$travaux = $connect->prepare("
			SELECT t.id_travaux,t.id_comp_travx,t.titre,t.slug AS article,t.date,t.projet,t.technique,t.fonctionnel,t.source,c.id_cat_compet,c.slug AS categorie,c.nom,ct.id_categorie,ct.slug,cp.id_travx_compteur,cp.mediocre,cp.convenable,cp.bon,cp.tres_bon,cp.excellent,stat.id_travx_stat,stat.nb_vue 
			FROM travaux AS t
			LEFT JOIN competences AS c ON t.id_comp_travx = c.id_competences
			LEFT JOIN categories AS ct ON c.id_cat_compet = ct.id_categorie
			LEFT JOIN compteur AS cp ON t.id_travaux = cp.id_travx_compteur
			LEFT JOIN statistiques AS stat ON t.id_travaux = stat.id_travx_stat 
			WHERE t.id_travaux = :numero");

	$travaux->bindValue('numero', $_GET['numero'], PDO::PARAM_STR);

	$travaux->execute();

	$travaux_fetch = $travaux->fetch();

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
	<title>Suprimer un projet</title>
	
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
					<li class="group-desktop"><a href="<?= WEBROOT; ?>jw_admin712/experiences/" title="Expériences" class="white lh-50-pg-25 hover deco">Expériences</a></li>
					<li class="group-desktop"><a href="<?= WEBROOT; ?>jw_admin712/travaux/" title="Travaux" class="white lh-50-pg-25 hover deco select-categorie">Travaux</a></li>
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
				<form id="contact" method="post" action="<?= WEBROOT; ?>jw_admin712/travaux/delete/<?= $_GET['numero']; ?>/"  enctype="multipart/form-data">
					<div class="form-submit">
					<input class="" type="hidden"  name="numero" value="<?= $_GET['numero']; ?>" />
					<!-- on mettra les info de soumissiona ce niveau pour les requetes ajax -->
						<input class="sub_rn" type="submit" name="envoyer" value="supprimer élément !" >
					</div>
				</form>
			</div>
		</div>
	<section class="qui-suis-je article-section">
		<h2>Suppression de : <?= $travaux_fetch['titre']; ?></h2>
		<div class="centrer">
			<article class="list-travaux">

			<div class="info-user">
				<div class="image">
					<img src="<?= WEBROOT; ?>img/travaux/etiquettes/<?= $travaux_fetch['article']; ?>.jpg" alt="<?= $travaux_fetch['titre']; ?>">
					<a href="<?= WEBROOT; ?>travaux/front-end/<?= $travaux_fetch['categorie']; ?>/<?= $travaux_fetch['article']; ?>/" title="<?= $travaux_fetch['nom']; ?>" class="info-generales">
						<div class="info-glissante">
							<div class="techno">
								<img src="<?= WEBROOT; ?>img/competences/<?= $travaux_fetch['categorie']; ?>_small.png" alt="<?= $travaux_fetch['nom']; ?>">
							</div>
							<div class="separateur"></div>
							<div class="list-info">
									<div class="nb-vue">
										<div class="icon-vue"><img src="<?= WEBROOT; ?>img/main/picto-vue.png" alt="monbres de vue pour ce travail"></div>
										<div class="info-vue">
											<p class="info1"><strong><?= $travaux_fetch['nb_vue']; ?></strong></p>
											<p class="info2">Lectures</p>
										</div>
									</div>
									<div class="nb-like">
									<?php 
										/*on prend le total des votes*/ 
										$total_votes = $travaux_fetch['mediocre'] + $travaux_fetch['convenable'] + $travaux_fetch['bon'] + $travaux_fetch['tres_bon'] + $travaux_fetch['excellent'];

										/*On donne un coefficeient de 1 à 5 afin d'avoir la moyenne de chaque bloc de la grille de vote */
										$mediocre = 1;
										$convenable = 2;
										$bon = 3;
										$tres_bon = 4;
										$excellent = 5;

										/*on calcule la moyenne sur 5*/
										$moyenne_mediocre = ($travaux_fetch['mediocre'] / $total_votes) * $mediocre;
										$moyenne_convenable = ($travaux_fetch['convenable'] / $total_votes) * $convenable;
										$moyenne_bon = ($travaux_fetch['bon'] / $total_votes) * $bon;
										$moyenne_tres_bon = ($travaux_fetch['tres_bon'] / $total_votes) * $tres_bon;
										$moyenne_excellent = ($travaux_fetch['excellent'] / $total_votes) * $excellent;

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
					<a href="<?= WEBROOT; ?>travaux/front-end/<?= $travaux_fetch['categorie']; ?>/<?= $travaux_fetch['article']; ?>/" title="<?= $travaux_fetch['titre']; ?>"><?= $travaux_fetch['titre']; ?></a>
				</p>
			</header>

		</article>
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