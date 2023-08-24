<header id="navbar">
    <div id="navbar-container" class="boxed">
        <div class="navbar-header">
            <a href="index.html" class="navbar-brand">
                <i class="fa fa-trello brand-icon"></i>
                <div class="brand-title">
                    <span class="brand-text">SensationApp</span>
                </div>
            </a>
        </div>
        <div class="navbar-content clearfix">
            <ul class="nav navbar-top-links pull-left">

                <li class="tgl-menu-btn">
                    <a class="mainnav-toggle" href="#"> <i class="fa fa-navicon fa-lg"></i> </a>
                </li>
            </ul>
            <ul class="nav navbar-top-links pull-right">
                <li class="hidden-xs" id="toggleFullscreen">
                    <a class="icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
                        <span class="sr-only">Toggle fullscreen</span>
                    </a>
                </li>
                <li id="dropdown-user" class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                        <span class="pull-right"> <img class="img-circle img-user media-object"
                                src="{{ asset('adminAsset/img/av1.png') }}" alt="Profile Picture"> </span>
                        <div class="username hidden-xs">John Doe</div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right with-arrow">
                        <!-- User dropdown menu -->
                        <ul class="head-list">
                            <li>
                                <a href="#"> <i class="fa fa-gear fa-fw fa-lg"></i> Settings </a>
                            </li>
                            <li>
                                <a href="#"> <i class="fa fa-sign-out fa-fw fa-lg"></i> Logout </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</header>
