<?php use Bnomei\Fingerprint; ?>

<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title><?= $site->title() ?></title>

<?php if($_SERVER['HTTP_HOST'] !== 'k3-scaffold.test'): ?>
	<meta name="robots" content="noindex,nofollow,noodp">
<?php endif; ?>

	<?= Fingerprint::css('assets/css/main.css') ?>
	<?= Fingerprint::js('assets/js/main.js') ?>

</head>
