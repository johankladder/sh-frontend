<nav class="navbar navbar-inverse bg-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
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
                <?php if ($view['security']->isGranted('ROLE_USER')) : ?>
                    <li><a href="#"><?= $view['translator']->trans('Map'); ?></a></li>
                    <li>
                        <a href="#">
                            <?= $view['translator']->trans('My Stadiums'); ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $view['router']->path('overview') ?>">
                            <?= $view['translator']->trans('Overview'); ?>
                        </a>
                    </li>
                    <li><a href="#"><?= $view['translator']->trans('Top List'); ?></a></li>
                    <li><a href="#"><?= $view['translator']->trans('Profile'); ?></a></li>
                <?php endif; ?>
            </ul>

            <!-- Settings side-->
            <ul class="nav navbar-nav navbar-right">

                <!-- Login side-->
                <?php if (!$view['security']->isGranted('ROLE_USER')): ?>
                    <li>
                        <a href="<?php echo $view['router']->path('login') ?>">
                            <?= $view['translator']->trans('Login'); ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $view['router']->path('register') ?>">
                            <?= $view['translator']->trans('Register'); ?>
                        </a>
                    </li>
                <?php else: ?>
                    <li>
                        <a href="<?php echo $view['router']->path('change-password') ?>">
                            <?= $view['translator']->trans('Change password'); ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $view['router']->path('logout') ?>">
                            <?= $view['translator']->trans('Logout'); ?>
                        </a>
                    </li>
                <?php endif ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
