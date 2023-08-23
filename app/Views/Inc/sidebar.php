
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
                <li class="menu-title" key="t-apps">Apps</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-group"></i>
                        <span key="t-accounts">Accounts</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?= base_url('dashboard/bankAccounts') ?>" key="t-tui-calendar">Bank Accounts</a></li>
                        <li><a href="<?= base_url('dashboard/qrisAccounts') ?>" key="t-tui-calendar">Qris Accounts</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx bxs-food-menu"></i>
                        <span key="t-deposit">E-Statement</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?= base_url('dashboard/estatement/bank') ?>" key="t-full-calendar">Bank</a></li>
                        <li><a href="<?= base_url('dashboard/estatement/qris') ?>" key="t-full-calendar">Qris</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx bxs-bank"></i>
                        <span key="t-deposit">Deposit</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?= base_url('dashboard/listDeposit') ?>" key="t-tui-calendar">List Deposit</a></li>
                        <li><a href="<?= base_url('dashboard/depoTransaction') ?>" key="t-tui-calendar">Transaction</a></li>
                        <li><a href="<?= base_url('dashboard/depoPending') ?>" key="t-full-calendar">Pending Deposit</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx bxs-wallet-alt"></i>
                        <span key="t-withdraw">Withdraw</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?= base_url('dashboard/withdrawTrans')?>" key="t-tui-calendar">Transaction</a></li>
                        <li><a href="<?= base_url('dashboard/withdrawPending')?>" key="t-full-calendar">Pending Withdraw</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-check-shield"></i>
                        <span key="t-settlement">Settlement</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?= base_url('dashboard/makeAdjustment')?>" key="t-tui-calendar">Adjustment</a></li>
                        <li><a href="<?= base_url('dashboard/calculateComission')?>" key="t-full-calendar">Calculate Commission</a></li>
                        <li><a href="<?= base_url('dashboard/hoWithdraw')?>" key="t-full-calendar">HO Withdraw</a></li>
                        <li><a href="<?= base_url('dashboard/topUp')?>" key="t-full-calendar">Top Up Client</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-book-content"></i>
                        <span key="t-settlement">Tracking Balance</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?= base_url('dashboard/trackingBalance')?>" key="t-tui-calendar">Detail</a></li>
                    </ul>
                </li>
                
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx bxs-archive"></i>
                        <span key="t-withdraw">Mapping client</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?= base_url('dashboard/listClients')?>" key="t-tui-calendar">List Clients</a></li>
                        <li><a href="<?= base_url('dashboard/listMap')?>" key="t-full-calendar">List Map</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class='bx bxs-bolt'></i>
                        <span key="t-withdraw">Generate Api</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?= base_url('dashboard/generateApis')?>" key="t-tui-calendar">List Api</a></li>
                        <li><a href="<?= base_url('dashboard/createApis')?>" key="t-tui-calendar">Create Api</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class='bx bxs-data'></i>
                        <span key="t-withdraw">Base Bank</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?= base_url('dashboard/baseBank')?>" key="t-tui-calendar">List Bank</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx bxs-user"></i>
                        <span key="t-withdraw">User Management</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?= base_url('dashboard/listUser')?>" key="t-tui-calendar">List User</a></li>
                        <li><a href="<?= base_url('dashboard/createUser')?>" key="t-tui-calendar">Create User</a></li>
                    </ul>
                </li>
                <li class="menu-title" key="t-report">Report</li>
                <li>
                    <a href="<?= base_url('dashboard/reportDaily') ?>" class="waves-effect">
                        <i class="bx bxs-bar-chart-alt-2"></i>
                        <span key="t-reportDaily">Daily Report</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('dashboard/monitoringLog') ?>" class="waves-effect">
                        <i class="bx bx-cog"></i>
                        <span key="t-monitoringLog">Monitoring Log</span>
                    </a>
                </li>
                <li class="menu-title" key="t-report">Documentation</li>
                <li>
                    <a href="<?= base_url('dashboard/documentationAPI') ?>" class="waves-effect">
                        <i class="bx bx-file"></i>
                        <span key="t-documentationAPI">API Documentation</span>
                    </a>
                </li>
                <?php elseif($_SESSION['role'] == 2):?>
                    <li class="menu-title" key="t-menu">Menu</li>
                    <li>
                        <a href="<?= base_url('dashboard') ?>" class="waves-effect">
                            <i class="bx bxs-home-circle"></i>
                            <span key="t-dashboards">Dashboards</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('dashboard/setBank') ?>" class="waves-effect">
                            <i class="bx bxs-dollar-circle"></i>
                            <span key="t-bank">Setting Bank</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bxs-group"></i>
                            <span key="t-accounts">Accounts</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="<?= base_url('dashboard/bankAccounts') ?>" key="t-tui-calendar">Bank Accounts</a></li>
                            <li><a href="<?= base_url('dashboard/qrisAccounts') ?>" key="t-tui-calendar">Qris Accounts</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx bxs-bank"></i>
                            <span key="t-deposit">Deposit</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="<?= base_url('dashboard/listDeposit') ?>" key="t-tui-calendar">List Deposit</a></li>
                            <li><a href="<?= base_url('dashboard/depoTransaction') ?>" key="t-tui-calendar">Transaction</a></li>
                            <li><a href="<?= base_url('dashboard/depoPending') ?>" key="t-full-calendar">Pending Deposit</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx bxs-wallet-alt"></i>
                            <span key="t-withdraw">Withdraw</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="<?= base_url('dashboard/withdrawTrans')?>" key="t-tui-calendar">Transaction</a></li>
                            <li><a href="<?= base_url('dashboard/withdrawPending')?>" key="t-full-calendar">Pending Withdraw</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bxs-check-shield"></i>
                            <span key="t-settlement">Settlement</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="<?= base_url('dashboard/listHo')?>" key="t-full-calendar">HO Withdraw</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bxs-book-content"></i>
                            <span key="t-settlement">Tracking Balance</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="<?= base_url('dashboard/trackingBalance')?>" key="t-tui-calendar">Detail</a></li>
                        </ul>
                    </li>
                    
                    <li class="menu-title" key="t-report">Report</li>
                    <li>
                        <a href="<?= base_url('dashboard/reportDaily') ?>" class="waves-effect">
                            <i class="bx bxs-bar-chart-alt-2"></i>
                            <span key="t-reportDaily">Daily Report</span>
                        </a>
                    </li>
                    <li class="menu-title" key="t-report">Documentation</li>
                    <li>
                        <a href="<?= base_url('dashboard/documentationAPI') ?>" class="waves-effect">
                            <i class="bx bx-file"></i>
                            <span key="t-documentationAPI">API Documentation</span>
                        </a>
                    </li>
                <?php elseif($_SESSION['role']== 3):?>
                    <li class="menu-title" key="t-menu">Menu</li>
                    <li>
                        <a href="<?= base_url('dashboard') ?>" class="waves-effect">
                            <i class="bx bxs-home-circle"></i>
                            <span key="t-dashboards">Dashboards</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('dashboard/setBank') ?>" class="waves-effect">
                            <i class="bx bxs-dollar-circle"></i>
                            <span key="t-bank">Setting Bank</span>
                        </a>
                    </li>
                    <li class="menu-title" key="t-apps">Apps</li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx bxs-bank"></i>
                            <span key="t-deposit">Deposit</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="<?= base_url('dashboard/myBill') ?>" key="t-tui-calendar">My Bill</a></li>
                            <li><a href="<?= base_url('dashboard/myDepo') ?>" key="t-full-calendar">List Deposit</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx bxs-wallet-alt"></i>
                            <span key="t-withdraw">Withdraw</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="<?= base_url('dashboard/makeWithdraw')?>" key="t-tui-calendar">Make Withdraw</a></li>
                            <li><a href="<?= base_url('dashboard/listWithdraw')?>" key="t-full-calendar">List Withdraw</a></li>
                        </ul>
                    </li>
                <?php elseif($_SESSION['role'] == 4):?>
                    <li class="menu-title" key="t-menu">Menu</li>
                <li>
                    <a href="<?= base_url('dashboard') ?>" class="waves-effect">
                        <i class="bx bxs-home-circle"></i>
                        <span key="t-dashboards">Dashboards</span>
                    </a>
                </li>
                <li class="menu-title" key="t-apps">Apps</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-group"></i>
                        <span key="t-accounts">Accounts</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?= base_url('dashboard/bankAccounts') ?>" key="t-tui-calendar">Bank Accounts</a></li>
                        <li><a href="<?= base_url('dashboard/qrisAccounts') ?>" key="t-tui-calendar">Qris Accounts</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx bxs-bank"></i>
                        <span key="t-deposit">Deposit</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?= base_url('dashboard/listDeposit') ?>" key="t-tui-calendar">List Deposit</a></li>
                        <li><a href="<?= base_url('dashboard/depoTransaction') ?>" key="t-tui-calendar">Transaction</a></li>
                        <li><a href="<?= base_url('dashboard/depoPending') ?>" key="t-full-calendar">Pending Deposit</a></li>
                        <li><a href="<?= base_url('dashboard/deposit/estatement') ?>" key="t-full-calendar">E-Statement</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx bxs-wallet-alt"></i>
                        <span key="t-withdraw">Withdraw</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?= base_url('dashboard/withdrawTrans')?>" key="t-tui-calendar">Transaction</a></li>
                        <li><a href="<?= base_url('dashboard/withdrawPending')?>" key="t-full-calendar">Pending Withdraw</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-check-shield"></i>
                        <span key="t-settlement">Settlement</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?= base_url('dashboard/makeAdjustment')?>" key="t-tui-calendar">Adjustment</a></li>
                        <li><a href="<?= base_url('dashboard/calculateComission')?>" key="t-full-calendar">Calculate Commission</a></li>
                        <li><a href="<?= base_url('dashboard/hoWithdraw')?>" key="t-full-calendar">HO Withdraw</a></li>
                        <li><a href="<?= base_url('dashboard/topUp')?>" key="t-full-calendar">Top Up Client</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-book-content"></i>
                        <span key="t-settlement">Tracking Balance</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?= base_url('dashboard/trackingBalance')?>" key="t-tui-calendar">Detail</a></li>
                    </ul>
                </li>
               
                <li class="menu-title" key="t-report">Report</li>
                <li>
                    <a href="<?= base_url('dashboard/reportDaily') ?>" class="waves-effect">
                        <i class="bx bxs-bar-chart-alt-2"></i>
                        <span key="t-reportDaily">Daily Report</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('dashboard/monitoringLog') ?>" class="waves-effect">
                        <i class="bx bx-cog"></i>
                        <span key="t-monitoringLog">Monitoring Log</span>
                    </a>
                </li>
                <li class="menu-title" key="t-report">Documentation</li>
                <li>
                    <a href="<?= base_url('dashboard/documentationAPI') ?>" class="waves-effect">
                        <i class="bx bx-file"></i>
                        <span key="t-documentationAPI">API Documentation</span>
                    </a>
                </li>
                    <?php endif ?>   
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
