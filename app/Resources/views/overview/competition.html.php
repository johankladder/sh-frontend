<?php $view->extend('base.html.php') ?>

<?php $view['slots']->start('body') ?>


<?php foreach ($competitions as $competition) : ?>
    <div class="col-md-2">
        <a href="<?php echo $view['router']->path('overview-clubs', array('competition' => $competition->getId())) ?>">
            <div class="entity">
                <div class="stadium-image"
                     style="background: no-repeat url(<?= $competition->getLogo() ?>) 50% / 100%;">
                    <img src="<?= $competition->getLogo() ?>">
                </div>
                <div class="overlay">
                    <div class="text"><?= $competition->getName() ?></div>
                </div>
            </div>
        </a>
    </div>
<?php endforeach; ?>

<?php $view['slots']->stop() ?>
