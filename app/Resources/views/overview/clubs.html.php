<?php $view->extend('base.html.php') ?>

<?php $view['slots']->start('body') ?>

<?php

?>


<?php foreach ($clubs as $club) : ?>
    <div class="col-md-2 col-xs-6">
        <div class="entity">
            <div class="stadium-image" style="background: no-repeat url(<?= $club['logo'] ?>) 50% / 100%;">
                <img src="<?= $club['logo'] ?>">
            </div>
            <div class="overlay">
                <div class="text"><?= $club['name'] ?></div>
            </div>
        </div>
    </div>
<?php endforeach; ?>




<?php $view['slots']->stop() ?>
