<?php require(__DIR__ . '/../base.html.php'); ?>

<h1><?= $view['translator']->trans('Register'); ?></h1>

<?php echo $view['form']->start($form) ?>
<?php echo $view['form']->widget($form) ?>
<?php echo $view['form']->end($form) ?>
