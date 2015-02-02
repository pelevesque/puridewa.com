<?php defined('SYSPATH') OR die('No direct access allowed.'); ?>
<h1><?php echo $page_name ?></h1>
<div id="content_wrapper">
<div id="content">
<?php foreach (Kohana::lang('facilities.paragraphs') as $paragraph): ?>
<p><?php echo $paragraph ?></p>
<?php endforeach ?>
<ul>
<?php foreach (Kohana::lang('facilities.features') as $feature): ?>
<li><span><?php echo $feature ?></span></li>
<?php endforeach ?>
</ul>
</div>
</div>
<div id="side_content">
<div class="image">
<img src="<?php echo $url_image_base ?>Puri_Dewa/Restaurant_Day.jpg" width="350px" height="232px" title="<?php echo Kohana::lang('images.Puri Dewa\'s Restaurant') ?>" alt="<?php echo Kohana::lang('images.Puri Dewa\'s Restaurant') ?>" />
<br />
<small><?php echo Kohana::lang('images.Puri Dewa\'s Restaurant') ?></small>
</div>
</div>
