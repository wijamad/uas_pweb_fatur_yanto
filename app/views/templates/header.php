<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?= $data['judul']; ?></title>
	<link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/bootstrap.min.css">
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-success shadow-sm">
		<div class="container">
			<a class="navbar-brand" href="<?= BASEURL; ?>anggota">SDGs Desa</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav">
					<a class="nav-item nav-link active" href="<?= BASEURL; ?>home">Home <span class="sr-only">(current)</span></a>
					<a class="nav-item nav-link" href="<?= BASEURL; ?>anggota">Anggota</a>
					<a class="nav-item nav-link" href="<?= BASEURL; ?>about">About</a>
				</div>
			</div>
		</div>
	</nav>