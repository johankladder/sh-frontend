<?php $view->extend('base.html.php') ?>

<?php $view['slots']->start('body') ?>

<?php

$stadiums = [

    [
            'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/Flag_of_the_Netherlands.svg/270px-Flag_of_the_Netherlands.svg.png',
            'name' => 'Nederland'

    ],
    [
            'logo' => 'http://www.vlag-specialist.nl/cliparts/vlagspecialist/duitsland.jpg',
            'name' => 'Duitsland'

    ],
]
?>


<?php foreach ($stadiums as $stadium) : ?>
    <div class="col-md-2">
        <a href="<?php echo $view['router']->path('overview-competition') ?>">
            <div class="entity">
                <div class="stadium-image" style="background: no-repeat url(<?= $stadium['logo'] ?>) 50% / 100%;">
                    <img src="<?= $stadium['logo'] ?>">
                </div>
                <div class="overlay">
                    <div class="text"><?= $stadium['name'] ?></div>
                </div>
            </div>
        </a>

    </div>
<?php endforeach; ?>




<?php $view['slots']->stop() ?>
