<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="    logo">
                <a href="<?php echo SITE_URL ?>">
                      <H1 ><?php echo Company_Name; ?></H1>
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li >
                            <a class="js-arrow" href="<?php echo CMS_URL.'/dashboard.php' ?>">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="far fa-check-square"></i>Category</a>
                                 <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="<?php echo CMS_URL.'/category_edit.php' ?>">Add Category</a>
                                </li>
                                <li>
                                    <a href="<?php echo CMS_URL.'/categories.php' ?>">List Category</a>
                                </li>

                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="far fa-check-square"></i>Personal Information</a>
                                 <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="<?php echo CMS_URL.'/personal_info_add.php' ?>">Add Personal Info</a>
                                </li>
                                <li>
                                    <a href="<?php echo CMS_URL.'/personal_info.php' ?>">View Information</a>
                                </li>

                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#" style="font-size: 15px;">
                                <i class="fas fa-copy"></i>Indust & Organizational Information</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="<?php echo CMS_URL.'/info_org_ind_add.php' ?>">Add</a>
                                </li>
                                <li>
                                    <a href="<?php echo CMS_URL.'/info_org_ind.php' ?>">View Information</a>
                                </li>
                            </ul>
                        </li>  
                         <li class="has-sub">
                            <a class="js-arrow" href="#" >
                                <i class="fas fa-copy"></i>Gallery</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="<?php echo CMS_URL.'/gallery.php' ?>">Add Images</a>
                                </li>
                                <li>
                                    <a href="<?php echo CMS_URL.'/gallery_list.php' ?>">View Images</a>
                                </li>
                            </ul>
                        </li> 
                         <li >
                            <a class="js-arrow" href="<?php echo CMS_URL.'/contact.php' ?>">
                                <i class="fas fa-tachometer-alt"></i>Messages</a>
                        </li> 
                          <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="far fa-check-square"></i>Pages</a>
                                 <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="<?php echo CMS_URL.'/newsandevent.php' ?>">News And Events</a>
                                </li>
                                <li>
                                    <a href="<?php echo CMS_URL.'/faq.php' ?>">FAQ</a>
                                </li>
                                    <li>
                                    <a href="<?php echo CMS_URL.'/about.php' ?>">About</a>
                                </li>

                            </ul>
                        </li>  
                    </ul>
                </nav>
            </div>
        </aside>    