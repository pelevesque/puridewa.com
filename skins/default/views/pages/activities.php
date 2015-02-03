<?php defined('SYSPATH') OR die('No direct access allowed.'); ?>
<h1><?php echo $page_name ?></h1>
<p id="activities_introduction"><?php echo Kohana::lang('activities.introduction') ?></p>
<?php foreach (Kohana::lang('activities.list') as $activity => $vals): ?>
<div class="activity clearfix">
<h2><?php echo $vals['name'] ?></h2>
<img src="<?php echo $url_image_base ?>activities/<?php echo $activity ?>.jpg" width="225px" height="150px" title="<?php echo $vals['name'] ?>" alt="<?php echo $vals['name'] ?>" />
<p><?php echo $vals['desc'] ?></p>
</div>
<?php endforeach ?>
