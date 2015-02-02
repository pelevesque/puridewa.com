<?php defined('SYSPATH') OR die('No direct access allowed.'); ?>
<h1><?php echo $page_name ?></h1>
<div id="content_wrapper">
<div id="content">
<?php foreach (Kohana::lang('location.paragraphs') as $paragraph): ?>
<p><?php echo $paragraph ?></p>
<?php endforeach ?>
<div class="image">
<img src="<?php echo $url_image_base ?>maps/Tabanan_Regency.jpg" width="464px" height="480px" title="<?php echo Kohana::lang('images.Tabanan Regency') ?>" alt="<?php echo Kohana::lang('images.Tabanan Regency') ?>" />
<br />
<small><?php echo Kohana::lang('images.Tabanan Regency') ?></small>
</div>
</div>
</div>
<div id="side_content">
<div class="image">
<a href="<?php echo $url_site ?>Bali_map"><img src="<?php echo $url_image_base ?>maps/Google_Map_Preview.jpg" width="260px" height="167px" title="<?php echo Kohana::lang('images.View Our Google Map') ?>" alt="<?php echo Kohana::lang('images.View Our Google Map') ?>" />
<br />
<small><?php echo Kohana::lang('images.View Our Google Map') ?></small>
</a>
</div>
</div>
