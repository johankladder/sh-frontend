<?php $view->extend('base.html.php') ?>

<?php $view['slots']->start('body') ?>

<?php

$stadiums = [

    [
            'logo' => 'http://www.frisbeesport.nl/cms/files/nieuws/eredivisie-logo.svg.png?d945972f57',
            'name' => 'Eredivisie'
    ],
    [
            'logo' => 'https://upload.wikimedia.org/wikipedia/de/9/9d/Jupiler_League_Logo.png',
            'name' => 'Jupiler Leaque'
    ],
]
?>


<?php foreach ($stadiums as $stadium) : ?>
    <div class="col-md-2">
        <a href="<?php echo $view['router']->path('overview-clubs', array('competition' => $stadium['name'])) ?>">
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
