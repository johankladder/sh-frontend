<li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
    aria-haspopup="true" aria-expanded="false">
        <?= $lang->getValue('language') ?><span class="caret"></span>
  </a>
  <ul class="dropdown-menu">
    <?php
        foreach($lang->getLangs() as $langKey => $value)
        {
            $link =  $view['router']->path('language', array('lang' => $langKey));
            echo $view->render('settings/_lang_entry.html.php',
            array('link' => $link, 'value' => $value));
        }
    ?>
  </ul>
</li>
