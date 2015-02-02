<?php defined('SYSPATH') OR die('No direct access allowed.') ?>
<h1><?php echo $page_name ?></h1>
<div id="content_wrapper">
<div id="content">
<?php if ( ! empty($errors)): ?>
<p class="error"><strong><?php if (count($errors) == 1) echo Kohana::lang('errors_forms.There is 1 error in the form'); else echo sprintf(Kohana::lang('errors_forms.There are %d errors in the form'), count($errors)) ?></strong></p>
<?php elseif (isset($num_sent_messages)): 
if ($num_sent_messages > 0): ?>
<p class="success"><strong><?php foreach (Kohana::lang('reservation._success') as $line) echo $line.'<br/>' ?></strong></p>
<?php else: ?>
<p class="error"><strong><?php echo Kohana::lang('errors_forms._sending_failed') ?></strong></p>
<?php endif;
endif; ?>
<form id="reservation" action="" method="post">
<h2><?php echo Kohana::lang('reservation.online booking') ?></h2>
<fieldset>
<legend><?php echo Kohana::lang('reservation.contact') ?></legend>
<p>
<label for="name"><?php echo Kohana::lang('reservation.name') ?></label>
<input type="text" name="name" id="name" value="<?php if (isset($values['name'])) echo $values['name'] ?>" maxlength="50" />
<?php if (isset($errors['name'])): ?>
<strong><?php echo $errors['name'] ?></strong>
<?php endif ?>
</p>
<p>
<label for="email"><?php echo Kohana::lang('reservation.email') ?></label>
<input type="text" name="email" id="email" value="<?php if (isset($values['email'])) echo $values['email'] ?>" />
<?php if (isset($errors['email'])): ?>
<strong><?php echo $errors['email'] ?></strong>
<?php endif ?>
</p>
</fieldset>
<fieldset>
<legend><?php echo Kohana::lang('reservation.accommodation') ?></legend>
<p>
<label for="accommodation_type"><?php echo Kohana::lang('reservation.type') ?></label>
<select name="accommodation_type" id="accommodation_type">
<?php
$i = 0;
foreach ($accommodation_prices as $accommodation => $vals): ?>
<option value="<?php echo $accommodation ?>"<?php if (isset($values['accommodation_type']) AND $values['accommodation_type'] == $accommodation ): ?> selected="selected"<?php endif ?>><?php echo Kohana::lang('prices.'.$accommodation) ?> (<?php echo $vals['price'] ?>)</option>
<?php $i++; endforeach ?>
</select>
<?php if (isset($errors['accommodation_type'])): ?>
<strong><?php echo $errors['accommodation_type'] ?></strong>
<?php endif ?>
</p>
<p>
<label for="accommodation_quantity"><?php echo Kohana::lang('reservation.total rooms') ?></label>
<select name="accommodation_quantity" id="accommodation_quantity">
<?php for ($i=1; $i<=$accommodation_quantity; $i++): ?>
<option value="<?php echo $i ?>"<?php if (isset($values['accommodation_quantity']) AND $values['accommodation_quantity'] == $i): ?> selected="selected"<?php endif ?>><?php echo $i ?></option>
<?php endfor ?>
</select>
<?php if (isset($errors['accommodation_quantity'])): ?>
<strong><?php echo $errors['accommodation_quantity'] ?></strong>
<?php endif ?>
</p>
<p>
<label for="num_people"><?php echo Kohana::lang('reservation.total people') ?></label>
<select name="num_people" id="num_people">
<?php for ($i=1; $i<16; $i++): ?>
<option value="<?php echo $i ?>"<?php if (isset($values['num_people']) AND $values['num_people'] == $i): ?> selected="selected"<?php endif ?>><?php echo $i ?></option>
<?php endfor ?>
</select>
<?php if (isset($errors['num_people'])): ?>
<strong><?php echo $errors['num_people'] ?></strong>
<?php endif ?>
</p>
</fieldset>
<fieldset>
<legend><?php echo Kohana::lang('reservation.dates') ?></legend>
<p>
<label for="check_in_date"><?php echo Kohana::lang('reservation.check in') ?></label>
<select name="check_in_date" id="check_in_date" class="check_in">
<option value="-"><?php echo Kohana::lang('date.date') ?></option>
<?php for ($i=1; $i<32; $i++): ?>
<option value="<?php echo $i ?>"<?php if (isset($values['check_in_date']) AND $values['check_in_date'] == $i): ?> selected="selected"<?php endif ?>><?php echo $i ?></option>
<?php endfor ?>
</select>
<select name="check_in_month" id="check_in_month" class="check_in">
<option value="-"><?php echo Kohana::lang('date.month') ?></option>
<?php foreach ($months as $month): ?>
<option value="<?php echo $month ?>"<?php if (isset($values['check_in_month']) AND $values['check_in_month'] == $month): ?> selected="selected"<?php endif ?>><?php echo Kohana::lang('date.'.$month) ?></option>
<?php endforeach ?>
</select>
<select name="check_in_year" id="check_in_year" class="check_in">
<option value="-"><?php echo Kohana::lang('date.year') ?></option>
<?php for ($i=date('Y'); $i<date('Y') + 3; $i++): ?>
<option value="<?php echo $i ?>"<?php if (isset($values['check_in_year']) AND $values['check_in_year'] == $i): ?> selected="selected"<?php endif ?>><?php echo $i ?></option>
<?php endfor ?>
</select>
<?php if (isset($errors['check_in_date'])): ?>
<strong><?php echo $errors['check_in_date'] ?></strong>
<?php endif;
if (isset($errors['check_in_month'])): ?>
<strong><?php echo $errors['check_in_month'] ?></strong>
<?php endif;
if (isset($errors['check_in_year'])): ?>
<strong><?php echo $errors['check_in_year'] ?></strong>
<?php endif ?>
</p>
<p>
<label for="check_out_date"><?php echo Kohana::lang('reservation.check out') ?></label>
<select name="check_out_date" id="check_out_date" class="check_out">
<option value="-"><?php echo Kohana::lang('date.date') ?></option>
<?php for ($i=1; $i<32; $i++): ?>
<option value="<?php echo $i ?>"<?php if (isset($values['check_out_date']) AND $values['check_out_date'] == $i): ?> selected="selected"<?php endif ?>><?php echo $i ?></option>
<?php endfor ?>
</select>
<select name="check_out_month" id="check_out_month" class="check_out">
<option value="-"><?php echo Kohana::lang('date.month') ?></option>
<?php foreach ($months as $month): ?>
<option value="<?php echo $month ?>"<?php if (isset($values['check_out_month']) AND $values['check_out_month'] == $month): ?> selected="selected"<?php endif ?>><?php echo Kohana::lang('date.'.$month) ?></option>
<?php endforeach ?>
</select>
<select name="check_out_year" id="check_out_year" class="check_out">
<option value="-"><?php echo Kohana::lang('date.year') ?></option>
<?php for ($i=date('Y'); $i<date('Y') + 3; $i++): ?>
<option value="<?php echo $i ?>"<?php if (isset($values['check_out_year']) AND $values['check_out_year'] == $i): ?> selected="selected"<?php endif ?>><?php echo $i ?></option>
<?php endfor ?>
</select>
<?php if (isset($errors['check_out_date'])): ?>
<strong><?php echo $errors['check_out_date'] ?></strong>
<?php endif;
if (isset($errors['check_out_month'])): ?>
<strong><?php echo $errors['check_out_month'] ?></strong>
<?php endif;
if (isset($errors['check_out_year'])): ?>
<strong><?php echo $errors['check_out_year'] ?></strong>
<?php endif ?>
</p>
</fieldset>
<fieldset>
<legend><?php echo Kohana::lang('reservation.airport arrival') ?> <small>(<?php echo Kohana::lang('reservation.optional') ?>)</small></legend>
<p>
<label for="airport_pickup"><?php echo Kohana::lang('reservation.pickup') ?></label>
<input type="checkbox" name="airport_pickup" id="airport_pickup"<?php if (isset($values['airport_pickup']) AND $values['airport_pickup'] == 1): ?> checked="checked"<?php endif ?> />
<?php if (isset($errors['airport_pickup'])): ?>
<strong><?php echo $errors['airport_pickup'] ?></strong>
<?php endif ?>
</p>
<p>
<label for="arrival_flight"><?php echo Kohana::lang('reservation.flight no') ?></label>
<input type="text" name="arrival_flight" id="arrival_flight" value="<?php if (isset($values['arrival_flight'])) echo $values['arrival_flight'] ?>" maxlength="15" />
<?php if (isset($errors['arrival_flight'])): ?>
<strong><?php echo $errors['arrival_flight'] ?></strong>
<?php endif ?>
</p>
<p>
<label for="arrival_time"><?php echo Kohana::lang('reservation.time') ?></label>
<input type="text" name="arrival_time" id="arrival_time" value="<?php if (isset($values['arrival_time'])) echo $values['arrival_time'] ?>" maxlength="15" />
<?php if (isset($errors['arrival_time'])): ?>
<strong><?php echo $errors['arrival_time'] ?></strong>
<?php endif ?>
</p>
</fieldset>
<p class="submit"><button type="submit"><?php echo Kohana::lang('reservation.send') ?></button></p>
</form>
</div>
</div>
<div id="side_content">
<div class="image">
<img src="<?php echo $url_image_base ?>Puri_Dewa/Breakfast.jpg" width="225px" height="339px" title="<?php echo Kohana::lang('images.Puri Dewa\'s Tropical Breakfast') ?>" alt="<?php echo Kohana::lang('images.Puri Dewa\'s Tropical Breakfast') ?>" />
<br />
<small><?php echo Kohana::lang('images.Puri Dewa\'s Tropical Breakfast') ?></small>
</div>
</div>
