<div class="navbar-right">
    <ul class="navbar-right__menu">
        
        <!-- ends: nav-message -->
        <li class="nav-notification">
            <div class="dropdown-custom">
                <a href="javascript:;" class="nav-item-toggle">
                    <span data-feather="bell"></span></a>
                <div class="dropdown-wrapper">
                    <h2 class="dropdown-wrapper__title">Notificaciones <span class="badge-circle badge-warning ml-1">1</span></h2>
                    <ul>
                        <li class="nav-notification__single nav-notification__single--unread d-flex flex-wrap">
                            <div class="nav-notification__type nav-notification__type--primary">
                                <span data-feather="inbox"></span>
                            </div>
                            <div class="nav-notification__details">
                                <p>
                                    <a href="" class="subject stretched-link text-truncate" style="max-width: 180px;">James</a>
                                    <span>sent you a message</span>
                                </p>
                                <p>
                                    <span class="time-posted">5 hours ago</span>
                                </p>
                            </div>
                        </li>
                        
                    </ul>
                    <a href="" class="dropdown-wrapper__more">Ver todas.</a>
                </div>
            </div>
        </li>
        <!-- ends: .nav-notification -->
        <li class="nav-author">
            <div class="dropdown-custom">
                <a href="javascript:;" class="nav-item-toggle"><img src="<?= media()?>/img/dashboard/author-nav.jpg" alt="" class="rounded-circle"></a>
                <div class="dropdown-wrapper">
                    <div class="nav-author__info">
                        <div class="author-img">
                            <img src="<?= media()?>/img/dashboard/author-nav.jpg" alt="" class="rounded-circle">
                        </div>
                        <div>
                            <h6>Abdullah Bin Talha</h6>
                            <span>UI Designer</span>
                        </div>
                    </div>
                    <div class="nav-author__options">
                        <ul>
                            <li>
                                <a href="">
                                    <span data-feather="user"></span> Profile</a>
                            </li>
                            <li>
                                <a href="">
                                    <span data-feather="settings"></span> Settings</a>
                            </li>
                            <li>
                                <a href="">
                                    <span data-feather="key"></span> Billing</a>
                            </li>
                            <li>
                                <a href="">
                                    <span data-feather="users"></span> Activity</a>
                            </li>
                            <li>
                                <a href="">
                                    <span data-feather="bell"></span> Help</a>
                            </li>
                        </ul>
                        <a href="" class="nav-author__signout">
                            <span data-feather="log-out"></span> Sign Out</a>
                    </div>
                </div>
                <!-- ends: .dropdown-wrapper -->
            </div>
        </li>
        <!-- ends: .nav-author -->
    </ul>
    <!-- ends: .navbar-right__menu -->
    <div class="navbar-right__mobileAction d-md-none">
        <a href="#" class="btn-author-action">
            <span data-feather="more-vertical"></span></a>
    </div>
</div>
</nav>
</header>