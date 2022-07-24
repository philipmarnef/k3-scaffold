<?php
	use Kirby\Toolkit\Html;
	use Bnomei\Fingerprint; 
?>

<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title><?= $site->title() ?></title>

<?php if($_SERVER['HTTP_HOST'] !== 'k3-scaffold.test'): ?>
	<meta name="robots" content="noindex,nofollow,noodp">
<?php endif; ?>

	<link href="<?= $page->url() ?>" rel="canonical">
	<link href="<?= $site->homePage()->url() ?>" rel="home">
<?php foreach($kirby->languages() as $language) {
	$href = $page->url($language->code());
	$lang = $language->code();
	echo "\t" . Html::tag('link', null, [
		'href' => $href,
		'rel' => 'alternate',
		'hreflang' => $lang,
	]) . "\n";
	if($language->isDefault()) {
		echo "\t" . Html::tag('link', null, [
			'href' => $href,
			'rel' => 'alternate',
			'hreflang' => 'x-default',
		]) . "\n";
	}
} ?>

	<?= Fingerprint::css('assets/css/main.css') ?>
	<?= Fingerprint::js('assets/js/main.js') ?>

</head>
