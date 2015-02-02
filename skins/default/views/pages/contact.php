<?php defined('SYSPATH') OR die('No direct access allowed.'); ?>
<h1><?php echo $page_name ?></h1>
<div id="content_wrapper">
<div id="content">
<?php if ( ! empty($errors)): ?>
<p class="error"><strong><?php if (count($errors) == 1) echo Kohana::lang('errors_forms.There is 1 error in the form'); else echo sprintf(Kohana::lang('errors_forms.There are %d errors in the form'), count($errors)) ?></strong></p>
<?php elseif (isset($num_sent_messages)): 
if ($num_sent_messages > 0): ?>
<p class="success"><strong><?php foreach (Kohana::lang('contact._success') as $line) echo $line.'<br/>' ?></strong></p>
<?php else: ?>
<p class="error"><strong><?php echo Kohana::lang('errors_forms._sending_failed') ?></strong></p>
<?php endif;
endif; ?>
<form id="contact" action="" method="post">
<h2><?php echo Kohana::lang('contact.send us a message') ?></h2>
<p>
<input type="text" id="name" name="name" value="<?php if (isset($values['name'])) echo $values['name'] ?>" maxlength="50" />
<label for="name"><?php echo Kohana::lang('contact.name') ?></label>
<?php if (isset($errors['name'])): ?>
<strong><?php echo $errors['name'] ?></strong>
<?php endif ?>
</p>
<p>
<input type="text" id="email" name="email" value="<?php if (isset($values['email'])) echo $values['email'] ?>" />
<label for="email"><?php echo Kohana::lang('contact.email') ?></label>
<?php if (isset($errors['email'])): ?>
<strong><?php echo $errors['email'] ?></strong>
<?php endif ?>
</p>
<p>
<input type="text" id="subject" name="subject" value="<?php if (isset($values['subject'])) echo $values['subject'] ?>" maxlength="50" />
<label for="subject"><?php echo Kohana::lang('contact.subject') ?></label>
<?php if (isset($errors['subject'])): ?>
<strong><?php echo $errors['subject'] ?></strong>
<?php endif ?>
</p>
<p>
<textarea id="message" name="message" rows="6" cols="30"><?php if (isset($values['message'])) echo $values['message']; ?></textarea>
<?php if (isset($errors['message'])): ?>
<strong><?php echo $errors['message'] ?></strong>
<?php endif ?>
</p>
<p class="submit"><button type="submit"><?php echo Kohana::lang('contact.send') ?></button></p>
</form>
</div>
</div>
<div id="side_content">
<p id="address"><?php echo $contact['address']['village'] ?>, <?php echo $contact['address']['region'] ?><br />
<?php echo $contact['address']['province'] ?>, <?php echo $contact['address']['country'] ?><br />
<em><?php echo Kohana::lang('contact.tel') ?>:</em> <?php echo $contact['tel'] ?><br />
<em><?php echo Kohana::lang('contact.fax') ?>:</em> <?php echo $contact['fax'] ?><br />
<a href="mailto:<?php echo html::email($contact['email']) ?>"><?php echo html::email($contact['email']) ?></a>
</p>
</div>
