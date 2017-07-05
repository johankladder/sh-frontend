<?php $view->extend('base.html.php') ?>

<?php $view['slots']->start('body') ?>
<h1><?= $view['translator']->trans('Register'); ?></h1>

<div class="login-view">
    <?php $view['form']->setTheme($form, array(':form')); ?>
    <?php echo $view['form']->form($form) ?>
</div>

<?php $view['slots']->stop() ?>






