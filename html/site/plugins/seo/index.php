<?php

return Kirby\Cms\App::plugin('phm/seo', [
	'blueprints' => [
		'fields/seo-description' => __DIR__ . '/blueprints/fields/seo-description.yml',
		'fields/seo-image' => __DIR__ . '/blueprints/fields/seo-image.yml',
		'tabs/seo-site' => __DIR__ . '/blueprints/tabs/seo-site.yml',
		'tabs/seo-page' => __DIR__ . '/blueprints/tabs/seo-page.yml',
	],
	'snippets' => [
		'seo' => __DIR__ . '/snippets/seo.php',
	],
]);
