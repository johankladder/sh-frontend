<?php
/**
 * Created by Johan Kladder & Sebe Jan Vogel.
 *
 * This file was created for the SH-frontend application.
 * Date: 23-5-17
 * Time: 17:41
 */


?>

<?php $view->extend('base.html.php') ?>

<?php $view['slots']->start('body') ?>
<?php if ($error): ?>
    <div>
        <?= $view['translator']->trans($error->getMessage()) ?>
    </div>
<?php endif ?>

<form action="<?php echo $view['router']->path('login') ?>" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="_username" value="<?php echo $last_username ?>" />

    <label for="password">Password:</label>
    <input type="password" id="password" name="_password" />

    <button type="submit">login</button>
</form>
<?php $view['slots']->stop() ?>


