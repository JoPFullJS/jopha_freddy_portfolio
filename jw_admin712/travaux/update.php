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

if(isset($_POST['id']) && isset($_POST['slug']) && isset($_POST['titre'])){

	$titre = htmlentities($_POST['titre']);
	$categorie = $_POST['categorie'];
	$competence = $_POST['competence'];
	$slug = htmlentities($_POST['slug']);
	$date = htmlentities($_POST['date']);
	$affichage = $_POST['affichage'];
	$projet = htmlentities($_POST['projet']);
	$technique = htmlentities($_POST['technique']);
	$fonctionnel = htmlentities($_POST['fonctionnel']);
	$source = htmlentities($_POST['source']);
	$mediocre = htmlentities($_POST['mediocre']);
	$convenable = htmlentities($_POST['convenable']);
	$bon = htmlentities($_POST['bon']);
	$tres_bon = htmlentities($_POST['tres_bon']);
	$excellent = htmlentities($_POST['excellent']);
	$nb_vue = htmlentities($_POST['nb_vue']);
	$id = $_POST['id'];

  if(isset($_GET['titre']))
  {


    $update_compteur = $connect->prepare("UPDATE compteur SET mediocre= :mediocre, convenable= :convenable, bon= :bon, tres_bon= :tres_bon, excellent= :excellent WHERE id_travx_compteur= :id");

    $update_compteur->bindValue('mediocre', $mediocre, PDO::PARAM_INT);
    $update_compteur->bindValue('convenable', $convenable, PDO::PARAM_INT);
    $update_compteur->bindValue('bon', $bon, PDO::PARAM_INT);
    $update_compteur->bindValue('tres_bon', $tres_bon, PDO::PARAM_INT);
    $update_compteur->bindValue('excellent', $excellent, PDO::PARAM_INT);
    $update_compteur->bindValue('id', $id, PDO::PARAM_INT);

    $update_compteur->execute();


    $update_statistique = $connect->prepare("UPDATE statistiques SET nb_vue= :nb_vue WHERE id_travx_stat= :id");

    $update_statistique->bindValue('nb_vue', $nb_vue, PDO::PARAM_INT);
    $update_statistique->bindValue('id', $id, PDO::PARAM_INT);

    $update_statistique->execute();
    

 	$update_travaux = $connect->prepare("UPDATE travaux SET id_cat_travx= :categorie, id_comp_travx= :competence, titre= :titre, slug= :slug, date= :date, projet= :projet, technique= :technique, fonctionnel= :fonctionnel, source= :source,affichage= :affichage WHERE id_travaux= :id");
    $update_travaux->bindValue('categorie', $categorie, PDO::PARAM_INT);
    $update_travaux->bindValue('competence', $competence, PDO::PARAM_INT);
    $update_travaux->bindValue('titre', $titre, PDO::PARAM_STR);
    $update_travaux->bindValue('slug', $slug, PDO::PARAM_STR);
    $update_travaux->bindValue('affichage', $affichage, PDO::PARAM_STR);
    $update_travaux->bindValue('date', $date, PDO::PARAM_STR);
    $update_travaux->bindValue('projet', $projet, PDO::PARAM_STR);
    $update_travaux->bindValue('technique', $technique, PDO::PARAM_STR);
    $update_travaux->bindValue('fonctionnel', $fonctionnel, PDO::PARAM_STR);
    $update_travaux->bindValue('source', $source, PDO::PARAM_STR);
    $update_travaux->bindValue('id', $id, PDO::PARAM_INT);

    $update_travaux->execute();

    if($update_travaux->execute()){
		setFlash("L'élément à été mise a jour avec succès !", "success");
		header('Location: ../');
	}
	else{
		setFlash("L'élément n'a pas pu être mise à jour !", "danger");
		header('Location: ../');
	}

  }

}
if(isset($_GET['titre'])){

	$travaux = $connect->prepare("
			SELECT t.id_travaux,t.id_comp_travx,t.titre,t.slug AS article,t.date,t.projet,t.technique,t.fonctionnel,t.source,t.affichage,c.id_cat_compet,c.slug AS categorie,c.nom,ct.id_categorie,ct.slug,cp.id_travx_compteur,cp.mediocre,cp.convenable,cp.bon,cp.tres_bon,cp.excellent,stat.id_travx_stat,stat.nb_vue 
			FROM travaux AS t
			LEFT JOIN competences AS c ON t.id_comp_travx = c.id_competences
			LEFT JOIN categories AS ct ON c.id_cat_compet = ct.id_categorie
			LEFT JOIN compteur AS cp ON t.id_travaux = cp.id_travx_compteur
			LEFT JOIN statistiques AS stat ON t.id_travaux = stat.id_travx_stat 
			WHERE t.slug = :titre");

	$travaux->bindValue('titre', $_GET['titre'], PDO::PARAM_STR);

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
	<title>Mettre à jour un projet</title>
	
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
	<section class="qui-suis-je article-section">
	<h2>Mettre à jour <?= $travaux_fetch['titre']; ?></h2>
		<div class="form-content">
			<form id="contact" method="post" action="#"  enctype="multipart/form-data">
				<div class="form-style">
						<label>ID :</label>
						<input type="text" name="id" value="<?= html_entity_decode($travaux_fetch['id_travaux']); ?>">
				</div>
				<div class="form-style">
						<label>ID categorie (Front =1, back=2, UI design=3) :</label>
						<input type="text" name="categorie" value="<?= $travaux_fetch['id_cat_compet']; ?>">
				</div>
				<div class="form-style">
						<label>ID competence (Front =1, back=2, UI design=3) :</label>
						<input type="text" name="competence" value="<?= $travaux_fetch['id_comp_travx']; ?>">
				</div>
				<div class="form-style">
						<label>Titre :</label>
						<input type="text" name="titre" value="<?= $travaux_fetch['titre']; ?>" >
				</div>
				<div class="form-style">
						<label>Slug :</label>
						<input type="text" name="slug" value="<?= $travaux_fetch['article']; ?>">
				</div>
				<div class="form-style">
						<label>affichage :</label>
						<input type="text" name="affichage" value="<?= $travaux_fetch['affichage']; ?>">
				</div>
				<div class="form-style">
						<label>Mediocre :</label>
						<input type="text" name="mediocre" value="<?= $travaux_fetch['mediocre']; ?>">
				</div>
				<div class="form-style">
						<label>Convenable :</label>
						<input type="text" name="convenable" value="<?= $travaux_fetch['convenable']; ?>">
				</div>
				<div class="form-style">
						<label>Bon :</label>
						<input type="text" name="bon" value="<?= $travaux_fetch['bon']; ?>">
				</div>
				<div class="form-style">
						<label>Très bon :</label>
						<input type="text" name="tres_bon" value="<?= $travaux_fetch['tres_bon']; ?>">
				</div>
				<div class="form-style">
						<label>Excellent :</label>
						<input type="text" name="excellent" value="<?= $travaux_fetch['excellent']; ?>">
				</div>
				<div class="form-style">
						<label>Nombre de vues :</label>
						<input type="text" name="nb_vue" value="<?= $travaux_fetch['nb_vue']; ?>">
				</div>
				<div class="form-style">
						<label>Date :</label>
						<input type="text" name="date" value="<?= $travaux_fetch['date']; ?>">
				</div>
				<div class="form-style">
						<label>Environement technique :</label>
						<input type="text" name="technique" value="<?= $travaux_fetch['technique']; ?>">
				</div>
				<div class="form-style">
						<label>Sources :</label>
						<input type="text" name="source" value="<?= $travaux_fetch['source']; ?>">
				</div>
				<div class="form-message">
					<label>Projet :</label>
					<textarea name="projet"><?= $travaux_fetch['projet']; ?></textarea>
				</div>
				<div class="form-message">
					<label>Compétences fonctionnelles :</label>
					<textarea name="fonctionnel"><?= $travaux_fetch['fonctionnel']; ?></textarea>
				</div>
				<div class="form-submit">
				<!-- on mettra les info de soumissiona ce niveau pour les requetes ajax -->
					<input class="sub_rn" type="submit" name="envoyer" value="Update <?= $travaux_fetch['article']; ?>" >
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