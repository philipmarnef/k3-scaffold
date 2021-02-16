<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title><?= $site->title() ?></title>

<?php if($_SERVER['HTTP_HOST'] !== 'k3-scaffold.test'): ?>
	<meta name="robots" content="noindex,nofollow,noodp">
<?php endif; ?>

	<?= css('assets/css/main.css') ?>
	<?= css('assets/css/print.css', 'print') ?>
	<?= js('assets/js/main.js') ?>

</head>
