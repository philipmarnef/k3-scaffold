<?php 

use Kirby\Toolkit\Html;

$metaurl = $page->url();

// we can override de page title in a controller if necessary
$title = $seo['title'] ?? $page->title() . ' | ' . $site->title();

// we can override the description in a controller if necessary
if(isset($seo) && isset($seo['description']))
{
	$description = $seo['description'];
}
// if not, the fall back on the page
elseif ($page->seotext()->isNotEmpty())
{
	$description = $page->seotext()->smartypants();
}
// ... or the site's SEO description
elseif ($site->seotext()->isNotEmpty())
{
	$description = $site->seotext()->smartypants();
}

// we can override de share image in a controller if necessary
if(isset($seo) && isset($seo['image']))
{
	$shareimage = $seo['image'];
}
// if not, the fall back on the page or the site's share image
else
{
	if($page->shareimage()->isNotEmpty()) {
		$shareimage = $page->shareimage()->toFile()->crop(1000,1000)->url();
	} elseif($site->shareimage()->isNotEmpty()) {
		$shareimage = $site->shareimage()->toFile()->crop(1000,1000)->url();
	} else if($firstImage = $page->images()->first()) {
		$shareimage = $firstImage->crop(1000,1000)->url();
	}
}

?>

<?= Html::tag('title', $title).PHP_EOL ?>
<?php if(isset($description)) print Html::tag('meta', null, ["name" => "description", "content" => $description]).PHP_EOL ?>
<?= Html::tag('meta', null, ["property" => "og:title", "content" => $title]).PHP_EOL ?>
<?= Html::tag('meta', null, ["property" => "og:type", "content" => 'website']).PHP_EOL ?>
<?= Html::tag('meta', null, ["property" => "og:site_name", "content" => $site->title()]).PHP_EOL ?>
<?= Html::tag('meta', null, ["property" => "og:url", "content" => $metaurl]).PHP_EOL ?>
<?php if(isset($shareimage)) print Html::tag('meta', null, ["property" => "og:image", "content" => $shareimage ]).PHP_EOL ?>
<?php if(isset($description)) print Html::tag('meta', null, ["property" => "og:description", "content" => $description]).PHP_EOL ?>
<?= Html::tag('meta', null, ["property" => "og:locale", "content" => $kirby->language()->locale()]).PHP_EOL ?>

<?= Html::tag('meta', null, ["name" => "twitter:title", "content" => $title]).PHP_EOL ?>
<?= Html::tag('meta', null, ["name" => "twitter:card", "content" => 'large_summary']).PHP_EOL ?>
<?php if($site->twitter_username()->isNotEmpty()): ?>
<?php $twitter = '@' . $site->twitter_username(); ?>
<?= Html::tag('meta', null, ["name" => "twitter:site", "content" => $twitter]).PHP_EOL ?>
<?= Html::tag('meta', null, ["name" => "twitter:creator", "content" => $twitter]).PHP_EOL ?>
<?php endif ?>
<?php if(isset($shareimage)) print Html::tag('meta', null, ["name" => "twitter:image", "content" => $shareimage ]).PHP_EOL ?>
<?= Html::tag('meta', null, ["name" => "twitter:url", "content" => $metaurl]).PHP_EOL ?>
<?php if(isset($description)) print Html::tag('meta', null, ["name" => "twitter:description", "content" => $description]).PHP_EOL ?>
