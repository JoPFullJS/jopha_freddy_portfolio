
<?php
include 'webroot.php'; 
include 'connect.php';
	if(isset($_POST["nom"]) && isset($_POST["mail"]) && isset($_POST["prenom"]) && isset($_POST["message"]))
	{
		$nom = htmlentities($_POST["nom"]);
		$prenom = htmlentities($_POST["prenom"]);
		$mail = htmlentities($_POST["mail"]);
		$tel = htmlentities($_POST["telephone"]);
		$url = htmlentities($_POST["web"]);
		$message = htmlentities($_POST["message"]);

	
		$mailBox = $connect->prepare("INSERT INTO contact SET nom= :nom, prenom= :prenom, mail= :mail,tel= :tel,url= :url,message= :message");

		$mailBox->bindValue('nom', $nom, PDO::PARAM_STR);
		$mailBox->bindValue('prenom', $prenom, PDO::PARAM_STR);
		$mailBox->bindValue('mail', $mail, PDO::PARAM_STR);
		$mailBox->bindValue('tel', $tel, PDO::PARAM_INT);
		$mailBox->bindValue('url', $url, PDO::PARAM_STR);
		$mailBox->bindValue('message', $message, PDO::PARAM_STR);

		$verifMail = $mailBox->execute();

		if($verifMail)
		{
			// PREPARATION DES DONNEES
			$ip           = $_SERVER["REMOTE_ADDR"];
			$hostname     = gethostbyaddr($_SERVER["REMOTE_ADDR"]);
			$destinataire = "mail@jophafreddy.fr";
			$objet        = $nom." ,Vous a envoyé un message";
			$contenu      = "Nom de l'expéditeur : " . $nom . "\r\n";
			$contenu     .= $message . "\r\n\n";
			$contenu     .= "Adresse IP de l'expéditeur : " . $ip . "\r\n";
			$contenu     .= "DLSAM : " . $hostname;

			$headers  = "From: " . $mail . " \r\n"; // ici l'expediteur du mail
			$headers .= "Content-Type: text/plain; charset=\"ISO-8859-1\"; DelSp=\"Yes\"; format=flowed /r/n";
			$headers .= "Content-Disposition: inline \r\n";
			$headers .= "Content-Transfer-Encoding: 7bit \r\n";
			$headers .= "MIME-Version: 1.0";
			
			if((empty($nom)) && (empty($objet)) && (empty($mail)) && (!filter_var($mail, FILTER_VALIDATE_EMAIL)) && (empty($message))) {
				echo 'echec :( <br /><a href="/contact/" title="Formulaire de contact">Retour au formulaire</a>';
			}
			else{
				// ENCAPSULATION DES DONNEES 
				//mail($destinataire, $objet, utf8_decode($contenu), $headers);
				mail($destinataire, $objet, $contenu, $headers);
				echo "Votre message &agrave; &eacute;t&eacute; envoyer avec succ&egrave;s.";
			}
		}
		
		
		
	}
	else
	{
		echo '<a href="/contact/" title="Formulaire de contact">Retour au formulaire</a>';
	}

	


?>