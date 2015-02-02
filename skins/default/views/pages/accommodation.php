<?php defined('SYSPATH') OR die('No direct access allowed.'); ?>
<h1><?php echo $page_name ?></h1>
<div id="content_wrapper">
<div id="content">
<?php foreach (Kohana::lang('accommodation.paragraphs') as $paragraph): ?>
<p><?php echo $paragraph ?></p>
<?php endforeach ?>
<h2><?php echo Kohana::lang('accommodation.pricing') ?></h2>
<ul>
<?php foreach ($accommodation_prices as $accommodation => $vals): ?>
<li><span><?php echo $accommodation ?> <span><?php echo $vals['price'] ?> <abbr title="<?php echo $vals['currency']['name'] ?>"><?php echo $vals['currency']['code'] ?></abbr></span></span></li>
<?php endforeach ?>
</ul>
</div>
</div>
<div id="side_content">
<div class="image">
<img src="<?php echo $url_image_base ?>Puri_Dewa/Room.jpg" width="350px" height="216px" title="<?php echo Kohana::lang('images.Ocean View Room') ?>" alt="<?php echo Kohana::lang('images.Ocean View Room') ?>" />
<br />
<small><?php echo Kohana::lang('images.Ocean View Room') ?></small>
</div>
<div class="image">
<img src="<?php echo $url_image_base ?>Puri_Dewa/Terrace.jpg" width="350px" height="237px" title="<?php echo Kohana::lang('images.Garden Terrace') ?>" alt="<?php echo Kohana::lang('images.Garden Terrace') ?>" />
<br />
<small><?php echo Kohana::lang('images.Garden Terrace') ?></small>
</div>
</div>
