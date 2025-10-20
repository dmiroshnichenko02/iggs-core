<?php
/**
 * ACF Flexible Layout: Map
 */
$google_map_link = $args['google_map_link'] ?? 'Europa Tower, Konstitucijos Street. 7A, Vilnius, Lithuania.';
?>

<section id="map" class="w-full h-[600px]">
  <iframe
    width="100%"
    height="100%"
    style="border:0"
    loading="lazy"
    allowfullscreen
    referrerpolicy="no-referrer-when-downgrade"
    src="https://www.google.com/maps?q=<?php echo urlencode($google_map_link); ?>&output=embed">
  </iframe>
</section>
