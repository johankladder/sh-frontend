<?php $view->extend('base.html.php') ?>

<?php $view['slots']->start('body') ?>

<?php foreach ($stadions as $stadion) : ?>
    <?php /** @var \AppBundle\Entity\Stadion $stadion */?>
    <div class="col-md-2 col-xs-6">
        <div class="entity">
            <div class="stadium-image" style="background: no-repeat url(<?= $stadion->getLogo() ?>) 50% / 100%;">
                <img src="<?= $stadion->getLogo() ?>">
            </div>
            <div class="overlay">
                <div class="text"><?= $stadion->getName()?></div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php $view['slots']->stop() ?>
