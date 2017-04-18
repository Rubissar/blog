<?php 

try {
	$db = new PDO('mysql:host=localhost;dbname=phpmyadmin;charset=utf8', 'phpmyadmin', 'admin');
} catch (Exception $e) {
	die('Erreur : '.$e->getMessage());
}

$reponse = $db->query('SELECT id, auteur, contenu, titre FROM blog__billet ORDER BY datepublic DESC LIMIT 0, 20');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Titre</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="styletest.css">
</head>
<body onload="myFunction();">
<div id="loader"></div>

<div style="display:none;" id="myDiv" class="animate-bottom">

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Informations</h2>
    </div>
    <div class="modal-body">
      <h3>Crédits:</h3>
      <ul>
      	<li>Sublime Text: <a href="http://sublimetext.com">Site</a></li>
      	<li>Font Awesome: <a href="http://fontawesome.io">Site</a></li>
      	<li>W3schools: <a href="https://www.w3schools.com/">Site</a></li>
      </ul>
      <h3>Sources:</h3>
      <p><a href="http://github.org/Rubiss/blog/">Github</a></p>
      <h3></h3>
    </div>
    <div class="modal-footer">
      <h3>Merci !</h3>
    </div>
  </div>

</div>
<header>
	<nav>
		<div class="no-drop nav-button">
			<a href="#" title="Accueil">
				<i class="fa fa-lg fa-home"></i>
			</a>
		</div>
		<div class="no-drop nav-button">
			<a href="#" title="Contact">
				<i class="fa fa-lg fa-envelope-o"></i>
			</a>
		</div>
		<div class="drop nav-button">
			<a href="#" title="github">
				<i class="fa fa-lg fa-github"></i>
			</a>
			<div class="drop-content">
				<a href="#" title="ForkMe">
					<i class="fa fa-lg fa-code-fork"></i>
				</a><br>
				<a href="#" title="Partager">
					<i class="fa fa-lg fa-share"></i>
				</a>
			</div>
		</div>
		<div class="no-drop nav-button">
			<button onclick="window.location.reload()">
				<i class="fa fa-lg fa-refresh"></i>
			</button>
		</div>
		<div class="no-drop nav-button">
			<button id="myBtn">
				<i class="fa fa-lg fa-sign-in"></i>
			</button>
		</div>
	</nav>
	<form>
		<input type="text" name="search" id="search" placeholder="Rechercher" accesskey="S" autocomplete="none"><button id="submit"><i class="fa fa-lg fa-search"></i></button>
	</form>
</header>
<main>
	<?php while ($donnees = $reponse->fetch()) { ?>
		<section>
			<h1><?php echo $donnees['titre']; ?></h1>
			<blockquote>
				<?php echo $donnees['contenu']; ?>
			</blockquote>
			<cite><?php echo $donnees['auteur']; ?></cite>
	</section>
	<?php }  $reponse->closeCursor(); ?>
</main>
<div id="spin-bottom"></div>
</div>
</body>
	<script type="text/javascript" src='scripttest.js'></script>
</html>