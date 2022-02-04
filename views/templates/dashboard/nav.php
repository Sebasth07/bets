<main class="main-content">
    <aside class="sidebar">
        <div class="sidebar__menu-group">
            <ul class="sidebar_nav">
                <li class="menu-title">
                    <span>Menú Principal</span>
                </li>
                <li class="has-child">
                    <a href="<?= base_url()?>office" class="">
                        <span data-feather="home" class="nav-icon"></span> 
                        <span class="menu-text">Resumen</span>
                    </a>
                </li>
                <li class="has-child">
                    <a href="#" class="">
                        <span data-feather="shopping-cart" class="nav-icon"></span>
                        <span class="menu-text" style="margin-right: 10px;">Productos</span>
                        <i class="fas fa-sort-down"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="<?= base_url()?>office/productos" class="">Admin Productos</a>
                        </li>
                    </ul>
                </li> 
            </ul>
        </div>
    </aside>