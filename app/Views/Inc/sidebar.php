<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <?php if($_SESSION['role'] == 1):?>
                <li class="menu-title" key="t-menu">Menu</li>
                <li>
                    <a href="<?= base_url('dashboard') ?>" class="waves-effect">
                        <i class="bx bxs-home-circle"></i>
                        <span key="t-dashboards">Dashboards</span>
                    </a>
                </li>
                <li class="menu-title" key="t-apps">Transaction</li>
                <li>
                    <a href="<?= base_url('dashboard/product') ?>" class="waves-effect">
                        <i class="bx bxl-product-hunt"></i>
                        <span key="t-products">Product</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('dashboard/trackingbalance') ?>" class="waves-effect">
                        <i class="bx bx-stats"></i>
                        <span key="t-tb">Tracking Balance</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx bxs-food-menu"></i>
                        <span key="t-dashboards">POS</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?= base_url('dashboard/pos') ?>" key="t-tui-pos">Cashier</a></li>
                        <li><a href="<?= base_url('dashboard/listpos') ?>" key="t-full-list">List</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?= base_url('dashboard/balance') ?>" class="waves-effect">
                        <i class="bx bx-dock-top"></i>
                        <span key="t-pemasukan">Balance</span>
                    </a>
                </li>
                <li class="menu-title" key="t-apps">Transactions</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-widget"></i>
                        <span key="t-category">Category</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?= base_url('dashboard/menucategory') ?>" key="t-tui-calendar">Menu</a>
                        </li>
                        <li><a href="<?= base_url('dashboard/balancecategory') ?>" key="t-tui-calendar">Balance</a>
                        </li>
                        </li>
                    </ul>
                </li>
                <li class="menu-title" key="t-apps">Settings</li>
                <li>
                    <a href="<?= base_url('dashboard/usermanagement') ?>" class="waves-effect">
                        <i class="bx bxs-group"></i>
                        <span key="t-usermg">User Management</span>
                    </a>
                </li>
                <?php else:?>
                    <li class="menu-title" key="t-menu">Menu</li>
                    <li>
                        <a href="<?= base_url('dashboard') ?>" class="waves-effect">
                            <i class="bx bxs-home-circle"></i>
                            <span key="t-dashboards">Dashboards</span>
                        </a>
                    </li>
                    <li>
                    <a href="<?= base_url('dashboard/pos') ?>" class="waves-effect">
                        <i class="bx bx bxs-food-menu"></i>
                        <span key="t-pos">POS</span>
                    </a>
                </li>
                <?php endif;?>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>