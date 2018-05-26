<!DOCTYPE html>
<html>
<head>
  <title><?= $site->title(); ?></title>
</head>
<body>
  <h1><?= $site->title(); ?></h1>
  <p><?= $site->copyright(); ?></p>
  <?= snippet('header'); ?>
</body>
</html>