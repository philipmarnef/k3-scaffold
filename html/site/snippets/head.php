<?php
	use Kirby\Toolkit\Html;
	use Bnomei\Fingerprint; 
?>

<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php if($_SERVER['HTTP_HOST'] !== 'k3-scaffold.test'): ?>
	<meta name="robots" content="noindex,nofollow,noodp">
	<title><?= $site->title() ?></title>
<?php else: ?>
	<?= snippet('seo') ?>
<?php endif ?>

	<link href="<?= $page->url() ?>" rel="canonical">
<?php if(!$page->isHomePage()): ?>
	<link href="<?= $site->homePage()->url() ?>" rel="home">
<?php endif ?>

<?php if($kirby->multilang()):
	foreach($kirby->languages() as $language):
		$href = $page->url($language->code());
		$lang = $language->code(); ?>
	<?= Html::tag('link', null, [
				'href' => $href,
				'rel' => 'alternate',
				'hreflang' => $lang,
	]); ?>
<?php if($language->isDefault()): ?>
	<?= Html::tag('link', null, [
				'href' => $href,
				'rel' => 'alternate',
				'hreflang' => 'x-default',
	]); ?>
<?php endif;
	endforeach;
endif ?>

	<?= Fingerprint::css('assets/css/main.css') ?>
	<?= Fingerprint::js('assets/js/main.js') ?>

</head>
