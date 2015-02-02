<?php defined('SYSPATH') OR die('No direct access allowed.'); ?>
<h1>Online Reservation</h1>
<b>name:</b> <?php echo $post->name ?><br />
<b>email:</b> <?php echo $post->email ?><br />
<b>accommodation type:</b> <?php echo $post->accommodation_type ?><br />
<b>accommodation quantity:</b> <?php echo $post->accommodation_quantity ?><br />
<b>num people</b> <?php echo $post->num_people ?><br />
<b>check-in:</b> <?php echo $post->check_in_date.' '.$post->check_in_month.', '.$post->check_in_year ?><br />
<b>check-out:</b> <?php echo $post->check_out_date.' '.$post->check_out_month.', '.$post->check_out_year ?><br />
<b>airport pick-up:</b> <?php if ($post->airport_pickup == 1): ?>yes<?php else: ?>no<?php endif ?><br />
<?php if ($post->airport_pickup == 1): ?>
<b>arrival flight:</b> <?php echo $post->arrival_flight ?><br />
<b>arrival time:</b> <?php echo $post->arrival_time ?><br />
<?php endif ?>
