<?php $view->extend('base.html.php') ?>

<?php $view['slots']->start('body') ?>
    <h1><?= $view['translator']->trans('Registered successfully!'); ?></h1>
<?php $view['slots']->stop() ?>

