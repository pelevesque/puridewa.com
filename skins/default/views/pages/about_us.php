<?php defined('SYSPATH') OR die('No direct access allowed.') ?>
<h1><?php echo $page_name ?></h1>
<div id="content_wrapper">
<div id="content">
<?php foreach (Kohana::lang('about_us.paragraphs') as $paragraph): ?>
<p><?php echo $paragraph ?></p>
<?php endforeach ?>
<ul id="features">
<?php foreach (Kohana::lang('about_us.features') as $key => $feature): ?>
<li><span><?php echo skin::icon(array($key, $feature), false, 'features') ?><?php echo $feature ?></span></li>
<?php endforeach ?>
</ul>
</div>
</div>
<div id="side_content">
<div class="image">
<img src="<?php echo $url_image_base ?>Puri_Dewa/Bungalow.jpg" width="350px" height="481px" title="<?php echo Kohana::lang('images.Lumbung Bungalow') ?>" alt="<?php echo Kohana::lang('images.Lumbung Bungalow') ?>"/>
<br />
<small><?php echo Kohana::lang('images.Lumbung Bungalow') ?></small>
</div>
</div>
