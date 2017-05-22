<?php
include 'webroot.php'; 
include 'connect.php';
	if(isset($_POST["nom"]) && isset($_POST["mail"]) && isset($_POST["message"]))
	{
		$nom = htmlentities($_POST["nom"]);
		$mail = htmlentities($_POST["mail"]);
		$article = $_POST["article"];
		$web = htmlentities($_POST["web"]);
		$message = htmlentities($_POST["message"]);
		
		
			$ajout_message = $connect->prepare("INSERT INTO commentaires SET id_travx_com = :article,nom = :nom,mail = :mail,site_web = :web,contenu = :message");

			$ajout_message->bindValue('article', $article, PDO::PARAM_INT);
			$ajout_message->bindValue('nom', $nom, PDO::PARAM_STR);
			$ajout_message->bindValue('mail', $mail, PDO::PARAM_STR);
			$ajout_message->bindValue('web', $web, PDO::PARAM_STR);
			$ajout_message->bindValue('message', $message, PDO::PARAM_STR);

			$ajout_message->execute();
		
			$select_message = $connect->prepare("SELECT id_travx_com,nom,mail,site_web,contenu,date FROM commentaires WHERE id_travx_com=:article ORDER BY date DESC LIMIT 1");

			$select_message->bindValue('article', $article, PDO::PARAM_INT);
			$select_message->execute();

			$affichage = $select_message->fetch();
			
			
			$annee=substr($affichage['date'],0,4);
			$mois=ltrim(substr($affichage['date'],5,2), "0");
			$jour=substr($affichage['date'],8,2);
			$heurs=substr($affichage['date'],11,8);

			$calendrier = array("Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Decembre");

			
			echo '<div class="content_post">
							<div class="userinfo">
								<div class="user"><a href="'.$web.'">'.$nom.'</a></div>
								<div class="date">'.$jour.'  '.$calendrier[$mois].'  '.$annee.'  '.$heurs.'</div></div>
							<div class="content">
								<div class="message"><p>'.$message.'</p></div>
							</div>
						</div>';
	}
	else
	{
		echo "<a href='#'>Retour au formulaire</a>";
	}

?>