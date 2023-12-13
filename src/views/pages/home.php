<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= $base; ?>/assets/css/reset.css">
    <link rel="stylesheet" href="<?= $base; ?>/assets/css/style.css">
    <title>Delícias da Tia Sê</title>

</head>

<body>
    <?php $render('header'); ?>
  <?php
  // Mostrar 10 botões de mesa
  for ($i = 1; $i <= 10; $i++) {
      echo "<a href='$base/mesa/$i/index'>Mesa $i</a>   ";
  }
  ?>

  <?php
  $this->render('produtosMesa');
  ?>

 
<?php
?>
</body>
</html>
