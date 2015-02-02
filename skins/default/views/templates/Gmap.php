<?php defined('SYSPATH') OR die('No direct access allowed.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $lang ?>" lang="<?php echo $lang ?>">  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <title><?php echo $website_name ?> &ndash; <?php echo $website_slogan ?> | <?php echo ucwords($webpage_title) ?></title>    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=<?php echo substr($lang, 0, 2) ?>"></script>    <script type="text/javascript">
      function initialize() {
        var latlng = new google.maps.LatLng(<?php echo $map_options['center']['Lat'] ?>, <?php echo $map_options['center']['Lng'] ?>);        var map_options = {          zoom: <?php echo $map_options['zoom'] ?>,          center: latlng,
          navigationControl: <?php echo $map_options['navigationControl'] ?>,
          mapTypeControl: <?php echo $map_options['mapTypeControl'] ?>,          scaleControl: <?php echo $map_options['scaleControl'] ?>,
          mapTypeId: google.maps.MapTypeId.<?php echo $map_options['type'] ?>
        };
        var bali_map = new google.maps.Map(document.getElementById("map_canvas"), map_options);
<?php foreach ($map_markers as $marker): ?>
        var latlng = new google.maps.LatLng(<?php echo $marker['Lat'] ?>, <?php echo $marker['Lng'] ?>);
        var marker_<?php echo str_replace(' ', '_', $marker['title']) ?> = new google.maps.Marker({
          position: latlng,          map: bali_map,          title: "<?php echo Kohana::lang('Bali_map.'.$marker['title']) ?>",
<?php if (isset($marker['icon'])): ?>
          icon: "<?php echo $map_icon_path.$marker['icon'] ?>",
<?php endif;
if (isset($marker['zIndex'])): ?>
          zIndex: <?php echo $marker['zIndex'] ?>
<?php endif ?>        });
<?php endforeach ?>
      }
    </script>  </head>  <body onload="initialize()">    <div id="map_canvas" style="position:absolute; width:98%; height:98%"></div>  </body></html>
