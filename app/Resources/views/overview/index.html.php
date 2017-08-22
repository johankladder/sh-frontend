<?php $view->extend('base.html.php') ?>

<?php $view['slots']->start('body') ?>

<?php foreach ($countries as $country) : ?>
    <div class="col-md-2">
        <a href="<?php echo $view['router']->path('overview-competition', array('country' => $country->getId())) ?>">
            <div class="entity">
                <div class="stadium-image" style="background: no-repeat url(<?= $country->getImage() ?>) 50% / 100%;">
                    <img src="<?= $country->getImage() ?>">
                </div>
                <div class="overlay">
                    <div class="text"><?= $country->getName() ?></div>
                </div>
            </div>
        </a>

    </div>
<?php endforeach; ?>




<?php $view['slots']->stop() ?>
