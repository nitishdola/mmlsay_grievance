<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="assets/images/logo-dark.png" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="assets/images/logo-light.png" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('sha.home') }}"><span data-key="t-dashboards">Dashboard</span>
                    </a>
                    
                </li> <!-- end Dashboard Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-apps-2-line"></i> <span data-key="t-apps">Grievances</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            
                            <li class="nav-item">
                                <a href="apps-chat.html" class="nav-link" data-key="t-chat"> View All </a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="apps-file-manager.html" class="nav-link"> <span data-key="t-file-manager">Pending at ISA</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="apps-todo.html" class="nav-link"> <span data-key="t-to-do">SHA Pending</span></a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="apps-api-key.html" class="nav-link" data-key="t-api-key">Out of TAT</a>
                            </li>
                        </ul>
                    </div>
                </li>

                

                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Master</span></li>

                

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarPages" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages">
                        <i class="ri-pages-line"></i> <span data-key="t-pages">Grievance Categories</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarPages">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('sha.master.grievance_category.create') }}" class="nav-link" data-key="t-starter"> Add </a>
                            </li>

                            <li class="nav-item">
                                <a href="pages-starter.html" class="nav-link" data-key="t-starter"> View </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>