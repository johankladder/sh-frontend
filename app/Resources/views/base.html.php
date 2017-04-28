<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Welcome</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />
        <link rel="stylesheet" href="<?php echo $view['assets']->getUrl('assets/vendor/bootstrap/dist/css/bootstrap.min.css') ?>">
        <link rel="stylesheet" href="<?php echo $view['assets']->getUrl('assets/css/sh-css.css') ?>">
        <script src="<?php echo $view['assets']->getUrl('assets/vendor/jquery/dist/jquery.min.js') ?>"></script>
        <script src="<?php echo $view['assets']->getUrl('assets/vendor/bootstrap/dist/js/bootstrap.min.js') ?>"></script>

        <?php require(__DIR__ . '/nav.html.php'); ?>
      </head>




<?php
  use AppBundle\Modules\LanguageModule;
?>

<?php $view['slots']->output('body') ?>
