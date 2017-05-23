<?php $view->extend('base.html.php') ?>

<?php $view['slots']->start('body') ?>
    <h1><?= $view['translator']->trans('Login'); ?></h1>
    <?php echo $view['form']->start($form) ?>
    <?php echo $view['form']->widget($form) ?>
    <?php echo $view['form']->end($form) ?>
<?php $view['slots']->stop() ?>


