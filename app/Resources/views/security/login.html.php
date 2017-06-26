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

<div class="login-view">
    <?php if ($error): ?>
        <div>
            <?= $view['translator']->trans($error->getMessage()) ?>
        </div>
    <?php endif ?>
    <div class="container">
        <form action="<?php echo $view['router']->path('login') ?>" method="post">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" placeholder="Username" name="_username"
                       value="<?php echo $last_username ?>"/>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="_password"/>

                <button class="btn btn-default btn-block form-button" type="submit">login</button>
            </div>
        </form>
    </div>
</div>

<?php $view['slots']->stop() ?>


