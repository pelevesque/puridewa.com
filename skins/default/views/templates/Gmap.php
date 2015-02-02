<?php defined('SYSPATH') OR die('No direct access allowed.'); ?>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo $website_name ?> &ndash; <?php echo $website_slogan ?> | <?php echo ucwords($webpage_title) ?></title>
      function initialize() {
        var latlng = new google.maps.LatLng(<?php echo $map_options['center']['Lat'] ?>, <?php echo $map_options['center']['Lng'] ?>);
          navigationControl: <?php echo $map_options['navigationControl'] ?>,
          mapTypeControl: <?php echo $map_options['mapTypeControl'] ?>,
          mapTypeId: google.maps.MapTypeId.<?php echo $map_options['type'] ?>
        };
        var bali_map = new google.maps.Map(document.getElementById("map_canvas"), map_options);
<?php foreach ($map_markers as $marker): ?>
        var latlng = new google.maps.LatLng(<?php echo $marker['Lat'] ?>, <?php echo $marker['Lng'] ?>);
        var marker_<?php echo str_replace(' ', '_', $marker['title']) ?> = new google.maps.Marker({
          position: latlng,
<?php if (isset($marker['icon'])): ?>
          icon: "<?php echo $map_icon_path.$marker['icon'] ?>",
<?php endif;
if (isset($marker['zIndex'])): ?>
          zIndex: <?php echo $marker['zIndex'] ?>
<?php endif ?>
<?php endforeach ?>
      }
    </script>