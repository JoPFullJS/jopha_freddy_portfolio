<?php
include 'webroot.php'; 
include 'connect.php';
if(isset($_POST['id']) && isset($_POST['article']))
{
	//on determine quel bouton à été selectionner afin d'avoir le nom de la colonne dans notre table compteur
	switch($_POST['id'])
		{
			case 0: $bouton = 'mediocre';
			break;
			case 1: $bouton = 'convenable';
			break;
			case 2: $bouton = 'bon';
			break;
			case 3: $bouton = 'tres_bon';
			break;
			case 4: $bouton = 'excellent';
			break;
		}   

	//on etalie la connexion avec ma base de donnée
	//$connect = new PDO('mysql:host=mysql.hostinger.fr;dbname=u961887215_jwork', 'u961887215_frd', '98g0GDFiZbVM');
	//$connect = new PDO('mysql:host=localhost;dbname=satisfaction', 'root', '');

	//On obtient l'adresse IP du routeur de l'utilisateur, cela permettra de l'identifier de manière unique 
	$ip = $_SERVER['REMOTE_ADDR'];
	// on cherche a savoir si l'utilisateur à déjà voter pour cette article en cherchant la paire ip_user / id_travx_compteur
	// afin de savoir si l'adresse ip de l'utilisateur est répertorier pour cette article.
	$count = $connect->prepare("SELECT COUNT(ip_user) AS vote FROM vote_ip WHERE id_travx_vote= :article AND ip_user= :ip");

	$count->bindValue('article', $_POST['article'], PDO::PARAM_INT);
	$count->bindValue('ip', $ip, PDO::PARAM_STR);
	$count->execute();

	$count_ip_row = $count->fetch();


	//Si $count_ip_row['vote'] est égal à zéro, alors il n'existe aucun vote de l'utilisateur pour cette article
	if($count_ip_row['vote'] == 0){

		//on ajoute les éléments de l'utilisateur, l'article pour lequel il à contribuer sont adresse ip ainsi quele bouton qu'il à selectionner à la table vote_ip
		$ajout_utilisateur= $connect->prepare("INSERT INTO vote_ip SET ip_user= :ip,id_travx_vote= :article,last_id= :id");

		$ajout_utilisateur->bindValue('ip', $ip, PDO::PARAM_STR);
		$ajout_utilisateur->bindValue('article', $_POST['article'], PDO::PARAM_INT);
		$ajout_utilisateur->bindValue('id', $_POST['id'], PDO::PARAM_INT);

		$ajout_utilisateur_req = $ajout_utilisateur->execute();

		//Dès que la requete est validé on execute la condition et les action qui suive
		if($ajout_utilisateur_req){

			//1.On selection le total des votes dans la colonne corresdante au bouton selectionner "$bouton"
			$ajout_unit = $connect->prepare("SELECT ".$bouton.",id_travx_compteur FROM compteur WHERE id_travx_compteur= :article");

			$ajout_unit->bindValue('article', $_POST['article'], PDO::PARAM_INT);

			$ajout_unit->execute();


			while($ajout_unit_row = $ajout_unit->fetch()){

				//2.On incremente de +1 le chiffre de cette colonne afin de comptabilisé le vote de l'utilisateur
				$unite = $ajout_unit_row[$bouton]+1;

				//3.on actualise les modifications de cette colonne
				$vote_actuel = $connect->prepare("UPDATE compteur SET ".$bouton."='".$unite."' WHERE id_travx_compteur= :article");

				$vote_actuel->bindValue('article', $_POST['article'], PDO::PARAM_INT);

				$vote_actuel->execute();

				//4.on selectionne cette colonne qui est maintenant à jour, afin que notre script JS actualise l'élément selectionner par l'utilisateur
				$reponse_json = $connect->prepare("SELECT ".$bouton." FROM compteur WHERE id_travx_compteur= :article");
				$reponse_json->bindValue('article', $_POST['article'], PDO::PARAM_INT);

				$reponse_json->execute();

				//5.on utilise une boucle while afin de traite les données de la reqête sql
				while($reponse_json_row = $reponse_json->fetch()){

					$vote = array();
					$vote['index'] = $_POST['id'];
					$vote['bouton'] = $reponse_json_row[$bouton];
					$vote['ok'] = 1;
					//On revoie un Objet Json comme reponse de retour à la méthode $.ajax de notre script
					echo json_encode($vote);
				}

			}

		}

	 }
	else if($count_ip_row['vote'] == 1){
		//Il existe au moins un vote de l'utilisateur pour cette article

		$date = new DateTime();
		$instant = $date->format('Y-m-d H:i:s');

		$select_date = $connect->prepare("SELECT date_vote AS date FROM vote_ip WHERE id_travx_vote= :article AND ip_user= :ip");

		$select_date->bindValue('article', $_POST['article'], PDO::PARAM_INT);
		$select_date->bindValue('ip', $ip, PDO::PARAM_STR);
		$select_date->execute();

		$select_date_row = $select_date->fetch();
		
		$date1 = strtotime($instant);
		$date2 = strtotime($select_date_row['date']);
			
		
		$intervalle = $date1 - $date2;
		if($intervalle > 86400){

			//on ajoute les éléments de l'utilisateur, l'article pour lequel il à contribuer sont adresse ip ainsi quele bouton qu'il à selectionner à la table vote_ip
			$ajout_last_id = $connect->prepare("UPDATE vote_ip SET last_id= :id WHERE id_travx_vote= :article AND ip_user= :ip");

			$ajout_last_id->bindValue('ip', $ip, PDO::PARAM_STR);
			$ajout_last_id->bindValue('article', $_POST['article'], PDO::PARAM_INT);
			$ajout_last_id->bindValue('id', $_POST['id'], PDO::PARAM_INT);
			$ajout_last_id_req = $ajout_last_id->execute();

			//Dès que la requete est validé on execute la condition et les action qui suive
			if($ajout_last_id_req){

				//1.On selection le total des votes dans la colonne corresdante au bouton selectionner "$bouton"
				$ajout_unit = $connect->prepare("SELECT ".$bouton.",id_travx_compteur FROM compteur WHERE id_travx_compteur= :article");

				$ajout_unit->bindValue('article', $_POST['article'], PDO::PARAM_INT);

				$ajout_unit->execute();


			while($ajout_unit_row = $ajout_unit->fetch()){

					//2.On incremente de +1 le chiffre de cette colonne afin de comptabilisé le vote de l'utilisateur
					$unite = $ajout_unit_row[$bouton]+1;

					//3.on actualise les modifications de cette colonne
					$vote_actuel = $connect->prepare("UPDATE compteur SET ".$bouton."='".$unite."' WHERE id_travx_compteur= :article");

					$vote_actuel->bindValue('article', $_POST['article'], PDO::PARAM_INT);

					$vote_actuel->execute();

					//4.on selectionne cette colonne qui est maintenant à jour, afin que notre script JS actualise l'élément selectionner par l'utilisateur
					$reponse_json = $connect->prepare("SELECT ".$bouton." FROM compteur WHERE id_travx_compteur= :article");
					$reponse_json->bindValue('article', $_POST['article'], PDO::PARAM_INT);

					$reponse_json->execute();

					//5.on utilise une boucle while afin de traite les données de la reqête sql
					while($reponse_json_row = $reponse_json->fetch()){

						$vote = array();
						$vote['index'] = $_POST['id'];
						$vote['bouton'] = $reponse_json_row[$bouton];
						$vote['ok'] = 1;
						//On revoie un Objet Json comme reponse de retour à la méthode $.ajax de notre script
						echo json_encode($vote);
					}

				}

			}

		}
		else if ($intervalle < 86400) {

			//On crer notre tableau afin d'y insérer les différents élément
			$vote = array();

			$select_last_id = $connect->prepare("SELECT last_id FROM vote_ip WHERE id_travx_vote= :article AND ip_user= :ip");

			$select_last_id->bindValue('article', $_POST['article'], PDO::PARAM_INT);
			$select_last_id->bindValue('ip', $ip, PDO::PARAM_STR);

			$select_last_id->execute();
			

			while($select_last_id_row = $select_last_id->fetch()){

					if($select_last_id_row['last_id'] != $_POST['id']){

					$vote['last_index'] = $select_last_id_row['last_id'];

					//on determine quel est le dernier bouton qui à été selectionner afin d'avoir le nom de la colonne dans notre table compteur
					switch($select_last_id_row['last_id'])
						{
							case 0: $last_bouton = 'mediocre';
							break;
							case 1: $last_bouton = 'convenable';
							break;
							case 2: $last_bouton = 'bon';
							break;
							case 3: $last_bouton = 'tres_bon';
							break;
							case 4: $last_bouton = 'excellent';
							break;
						}  

					//1.On selection le total des votes dans la colonne corresdante au bouton selectionner "$last_bouton"
					$retrait_unit = $connect->prepare("SELECT ".$last_bouton." FROM compteur WHERE id_travx_compteur= :article");

					$retrait_unit->bindValue('article', $_POST['article'], PDO::PARAM_INT);
					$retrait_unit->execute();

							while($retrait_unit_row = $retrait_unit->fetch()){

							//2.On incremente de +1 le chiffre de cette colonne afin de comptabilisé le vote de l'utilisateur
							$moins_unite = $retrait_unit_row[$last_bouton]-1;

							//3.on actualise les modifications de cette colonne
							$last_vote = $connect->prepare("UPDATE compteur SET ".$last_bouton."='".$moins_unite."' WHERE id_travx_compteur= :article");

							$last_vote->bindValue('article', $_POST['article'], PDO::PARAM_INT);

							$last_vote->execute();

							//4.on selectionne cette colonne qui est maintenant à jour, afin que notre script JS actualise l'élément selectionner par l'utilisateur
							$select_last_vote = $connect->prepare("SELECT ".$last_bouton." FROM compteur WHERE id_travx_compteur= :article");

							$select_last_vote->bindValue('article', $_POST['article'], PDO::PARAM_INT);

							$select_last_vote->execute();

							//5.on utilise une boucle while afin de traite les données de la reqête sql
							while($select_last_vote_row = $select_last_vote->fetch()){

								$vote['last_bouton'] = $select_last_vote_row[$last_bouton];

								//on remplace le dernière last_id connu par le last_id courant
								$ajout_last_id = $connect->prepare("UPDATE vote_ip SET last_id= :id WHERE id_travx_vote= :article AND ip_user= :ip");

								$ajout_last_id->bindValue('id', $_POST['id'], PDO::PARAM_INT);
								$ajout_last_id->bindValue('ip', $ip, PDO::PARAM_STR);
								$ajout_last_id->bindValue('article', $_POST['article'], PDO::PARAM_INT);


								$ajout_last_id->execute();

								//1.On selection le total des votes dans la colonne corresdante au bouton selectionner "$bouton"
								$ajout_unit = $connect->prepare("SELECT ".$bouton." FROM compteur WHERE id_travx_compteur= :article");

								$ajout_unit->bindValue('article', $_POST['article'], PDO::PARAM_INT);

								$ajout_unit->execute();


								while($ajout_unit_row = $ajout_unit->fetch()){

									//2.On incremente de +1 le chiffre de cette colonne afin de comptabilisé le vote de l'utilisateur
									$unite = $ajout_unit_row[$bouton]+1;

									//3.on actualise les modifications de cette colonne
									$vote_actuel = $connect->prepare("UPDATE compteur SET ".$bouton."='".$unite."' WHERE id_travx_compteur= :article");
									$vote_actuel->bindValue('article', $_POST['article'], PDO::PARAM_INT);

									$vote_actuel->execute();

									//4.on selectionne cette colonne qui est maintenant à jour, afin que notre script JS actualise l'élément selectionner par l'utilisateur
									$reponse_json = $connect->prepare("SELECT ".$bouton." FROM compteur WHERE id_travx_compteur= :article");

									$reponse_json->bindValue('article', $_POST['article'], PDO::PARAM_INT);
									$reponse_json->execute();

									//5.on utilise une boucle while afin de traite les données de la reqête sql
									while($reponse_json_row = $reponse_json->fetch()){

										  $vote['index'] = $_POST['id'];
										  $vote['bouton'] = $reponse_json_row[$bouton];
										  $vote['ok'] = 0;
										  $vote['error_vote'] = 0;
										  //On revoie un Objet Json comme reponse de retour à la méthode $.ajax de notre script
										  echo json_encode($vote);
									}

								}
								  
							}

						}

					}
					else{

						$vote['error_vote'] = 1;
						echo json_encode($vote);
						
					}
			}
			
		}

	}

}
else{
						//On renvoire un message d'erreur à notre utilisateur
						$vote = array();
						$vote['message_error'] = "Vous ne pouvez pas utiliser ce script sans un article associe !!!";
						echo json_encode($vote);
}

 ?>
