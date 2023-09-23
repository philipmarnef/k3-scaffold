<!DOCTYPE html>
<html lang="<?= $kirby->languageCode() ?? 'en' ?>">
<?= snippet('head') ?>

<body>
	<h1>404 – Page Not Found</h1>
	<p>We couldn't find the page you're looking for.<br> <a href="<?= $site->homePage()->url() ?>">Go to the homepage</a> instead.</p>
</body>

</html>
