<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="<?php echo PATH; ?>"><img src="<?php echo PATH; ?>images/logo.png" alt="Logo"></a>
            <a class="navbar-brand hidden" href="<?php echo PATH; ?>"><img src="<?php echo PATH; ?>images/logo2.png" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo PATH; ?>account/?view=profile"> <i class="menu-icon fa fa-user"></i>Mon profil </a></li>
                <li><a href="<?php echo PATH; ?>account/?view=notifications"> <i class="menu-icon fa fa-bell"></i>Notifications </a></li>
                <li><a href="<?php echo PATH; ?>account/?view=cv"> <i class="menu-icon fa fa-file"></i>Mon CV </a></li>
                <li><a href="<?php echo PATH; ?>account/?view=jobapplications"> <i class="menu-icon fa fa-bookmark"></i>Demandes </a></li>
                <li><a href="<?php echo PATH; ?>account/?view=societies"> <i class="menu-icon fa fa-building"></i>Entreprises</a></li>
                <li><a href="<?php echo PATH; ?>account/?view=logout"> <i class="menu-icon fa fa-power-off"></i>Se déconnecter </a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->