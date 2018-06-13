<?php
    $mapKey = c::get('google.maps.key');
    $mapLocale = $site->language->code();
?>

<script type="text/javascript">
    window.googleMapsStyle = <?php include_once 'assets/maps/gray.json'; ?>;
</script>

<?= js("https://maps.googleapis.com/maps/api/js?key=$mapKey&language=$mapLocale&callback=GoogleMapsLoaded", array(
    'async' => true,
    'defer' => true
)); ?>