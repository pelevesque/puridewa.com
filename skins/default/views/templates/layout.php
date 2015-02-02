<?php defined('SYSPATH') OR die('No direct access allowed.'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $lang ?>" lang="<?php echo $lang ?>">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="keywords" content="<?php echo $meta_keywords ?>" />
<meta name="description" content="<?php echo $meta_description ?>" />
<title><?php echo $website_name ?> &ndash; <?php echo $website_slogan ?> | <?php echo ucwords($webpage_title) ?></title>
<?php skin::load_assets() ?>
<!--[if lt IE 8]>
<link rel="stylesheet" href="<?php echo $url_base.Kohana::config('skin.IE_CSS_FIX') ?>" type="text/css" />
<![endif]-->
</head>
<body>
<?php if (count($languages) > 1): ?>
<ul id="language_picker" class="clearfix">
<?php foreach (array_reverse($languages) as $code => $vals):
if ($lang != $code):
$item_url = $url_base.$code.'/'.$url_current;
$lang_name = str_replace('_', ' (', $vals[1]).')'; ?>
<li id="<?php echo $vals[0] ?>" title="<?php echo $lang_name ?>"><a href="<?php echo $item_url ?>"><?php echo $lang_name ?></a></li>
<?php endif;
endforeach ?>
</ul>
<?php endif ?>
<div id="header" class="clearfix">
<h1><?php echo $website_name ?></h1>
<h2><?php echo $website_slogan ?></h2>
</div>
<div id="panorama"></div>
<?php if ($nav): ?>
<ul id="nav" class="clearfix">
<?php foreach ($nav as $item => $item_url):
if ($item_url == $url): ?>
<li class="active"><?php echo $item ?></li>
<?php else: ?>
<li><a href="<?php echo $item_url ?>"><?php echo $item ?></a></li>
<?php endif;
endforeach ?>
</ul>
<?php endif ?>
<div id="body" class="clearfix">
<?php echo $content ?>
</div>
<?php if ($copyright OR $skin_credits): ?>
<ul id="credits">
<?php if ($copyright): ?>
<li><?php echo $copyright ?></li>
<?php endif;
if ($skin_credits): ?>
<li><?php echo $skin_credits ?></li>
<?php endif; ?>
</ul>
<?php endif ?>
</body>
</html>
