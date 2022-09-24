<header>
    <div class="brand"></div>
    <a href="<?=URI?>logout" class="logout"><i class="fa fa-sign-out-alt"></i></a>
    <div class="user"></div>
</header>
<aside>
    <div class="menu">
        <ul class="menu-list">
            <!-- <li class="menu-item">
                <a href="<?=URI?>home">
                    <i class="fa fa-home"></i>
                    <span>Accueil</span>
                </a>
            </li> -->
<?php if(ROLE != "agent"):?>
            <li class="menu-item">
                <a href="<?=URI?>catalogue" class="menu-anchor">
                    <i class="fa fa-tag"></i>
                    <span>Articles</span>
                </a>
                <div class="submenu">
                    <span class="arrow"></span>
                    <ul class="submenu-list">
                        <li>
                            <a href="<?=URI?>catalogue" class="submenu-anchor">Catalogue</a>
                        </li>
                        <li>
                            <a href="<?=URI?>achats" class="submenu-anchor">Entrées</a>
                        </li>
                        <li>
                            <a href="<?=URI?>ventes" class="submenu-anchor">Sorties</a>
                        </li>
                    </ul>
                </div>
            </li>
            

            <li class="menu-item">
                <a href="#" class="menu-anchor">
                    <i class="fa fa-boxes"></i>
                    <span>Stock</span>
                </a>
                <div class="submenu">
                    <span class="arrow"></span>
                    <ul class="submenu-list">
                        <li>
                            <a href="<?=URI?>categories" class="submenu-anchor">Categories</a>
                        </li>
                        <li>
                            <a href="<?=URI?>emplacements" class="submenu-anchor">Emplacements</a>
                        </li>
                    </ul>
                </div>
            </li>
<?php endif;?>
<?php if(ROLE == "superadmin"):?>
            <li class="menu-item">
                <a href="<?=URI?>users">
                    <i class="fa fa-user"></i>
                    <span>Utilisateurs</span>
                </a>
            </li>
<?php endif;?>
        </ul>
    </div>
</aside>