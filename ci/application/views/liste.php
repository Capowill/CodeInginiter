	<!-- application/views/liste.php -->
	<!DOCTYPE html>
	<html lang="fr">

	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="<?= base_url("assets/css/style.css"); ?>"> 
		<title>Liste des produits</title>
	</head>

	<body>
	<h1>Codeigniter PHP Exo </h1>

		<h1>Liste des produits (exercice 1)</h1>

		<p>Bonjour <?php echo $prenom, " ", $nom; ?> !</p>

		<h1>Liste des produits (exercice 2)</h1>

		<ul>
			<?php foreach ($article as $items) : ?>
				<li><?php echo $items; ?></li>
			<?php endforeach; ?>
		</ul>

		<h1>Liste des produits (url)</h1>

		<a href="<?= site_url(); ?>">
			Modifier
		</a>

		<h1>Liste des produits (Base de donnée)</h1>

	<?php 
		foreach ($liste as $row) {
			echo"<p>".$row->pro_id."</p>";
			echo"<p>".$row->pro_ref."</p>";
			echo"<p>".$row->pro_libelle."</p>";
			//echo"<p>".$row->pro_libelle."</p>";
			echo"<p>".$row->pro_description."</p>"; 
			echo "<hr>";
			}
	?>
	<!-- --------- Formulaire CodeIgniter --------- -->
	<h1>Liste des produits (Formulaire)</h1>

		<a href="<?= site_url("produits/ajouter"); ?>">
			Formulaire
		</a>

	</body>

	</html>