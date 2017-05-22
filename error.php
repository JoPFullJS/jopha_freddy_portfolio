<?php
include 'lib/webroot.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="<?= WEBROOT; ?>css/common.css" type="text/css" >
	<title>Erreur 404</title>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-98277172-1', 'auto');
  ga('send', 'pageview');

</script>	
</head>
<body id="page-error">
	<div class="article-section error-img"><img src="<?= WEBROOT; ?>img/main/error.png" alt="erreur 404"></div>
	<a href="http://www.jophafreddy.fr/">Retour à l'accueil</a>
</body>
</html>