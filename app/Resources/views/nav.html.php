<?php

use AppBundle\Modules\LanguageModule;

$lang = new LanguageModule();
LanguageModule::load();

?>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">StadiumHopper</a>
    </div>

    <!-- Menu -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li><a href="#"><?= $lang->getValue('map'); ?></a></li>
      <li><a href="#"><?= $lang->getValue('my_stadiums'); ?></a></li>
      <li><a href="#"><?= $lang->getValue('top_list'); ?></a></li>
      <li><a href="#"><?= $lang->getValue('profile'); ?></a></li>
    </ul>

    <!-- Login side -->
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
         <a   href="#" class="dropdown-toggle"
              data-toggle="dropdown" role="button"
              aria-haspopup="true" aria-expanded="false">
              <?= $lang->getValue('language') ?><span class="caret"></span>
          </a>
         <ul class="dropdown-menu">
          <?php
              foreach($lang->getLangs() as $langKey => $value)
              {
                  $link =  $view['router']->path('language', array('lang' => $langKey));
                  echo '<li><a href="' . $link . '">' . $value . '</a></li>';
              }
          ?>
         </ul>
      </li>
      <li>
        <a href="<?php echo $view['router']->path('register') ?>">
          <?= $lang->getValue('register'); ?>
        </a>
      </li>
      <li>
        <a href="#">
          <?= $lang->getValue('log_out'); ?>
        </a>
      </li>
    </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
