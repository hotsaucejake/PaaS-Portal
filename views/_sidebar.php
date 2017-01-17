<!-- BEGIN CONTAINER -->
<div class="page-container">
   <!-- BEGIN SIDEBAR -->
   <div class="page-sidebar-wrapper">
        <!-- BEGIN SIDEBAR -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <div class="page-sidebar navbar-collapse collapse">
            <!-- BEGIN SIDEBAR MENU -->
            <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
            <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
            <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
            <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
            <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
            <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->


            <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-light " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <li class="sidebar-toggler-wrapper hide">
                    <div class="sidebar-toggler">
                        <span></span>
                    </div>
                </li>
                <!-- END SIDEBAR TOGGLER BUTTON -->

                <li class="heading">
                    <h3 class="uppercase">Forms</h3>
                </li>
                
                <li class="nav-item start">
                   <a href="index.php?page=permanent-placement" class="nav-link ">
                      <i class="fa fa-plus-circle"></i>
                      <span class="title">Permanent Placement</span>
                   </a>
                   <ul class="sub-menu always-open">
                      <li class="nav-item">
                        <a href="index.php?page=permanent-placement-view" class="nav-link">
                           <i class="fa fa-plus-circle"></i>
                           <span class="title">View / Edit</span>
                        </a>
                     </li>
                  </ul>
                </li>
                
                <li class="nav-item start ">
                   <a href="index.php?page=contract-billing" class="nav-link ">
                      <i class="fa fa-copy"></i>
                      <span class="title">Contract Billing</span>
                   </a>
                   <ul class="sub-menu always-open">
                      <li class="nav-item">
                        <a href="index.php?page=contract-billing-view" class="nav-link">
                           <i class="fa fa-copy"></i>
                           <span class="title">View / Edit</span>
                        </a>
                     </li>
                  </ul>
                </li>

                <li class="heading">
                    <h3 class="uppercase">Resources</h3>
                </li>
                <li class="nav-item start ">
                   <a href="index.php?page=feedback" class="nav-link ">
                      <i class="fa fa-comments-o"></i>
                      <span class="title">Feedback</span>
                   </a>
                </li>


                <?php
                // Checks to see if user has permission to view
                if($_SESSION['user_role'] == "super" || $_SESSION['user_role'] == "admin") { ?>
                <li class="heading">
                    <h3 class="uppercase">Admin</h3>
                </li>
                <li class="nav-item start ">
                   <a href="index.php?admin=activate-user" class="nav-link ">
                      <i class="fa fa-user-plus"></i>
                      <span class="title">Activate Users</span>
                   </a>
                </li>
                <?php } ?>
                <?php if($_SESSION['user_role'] == "super") { ?>
                <li class="nav-item start ">
                   <a href="index.php?admin=test" class="nav-link ">
                      <i class="fa fa-code"></i>
                      <span class="title">Test</span>
                   </a>
                </li>
                <?php } ?>

            </ul>
            <!-- END SIDEBAR MENU -->
            <!-- END SIDEBAR MENU -->
        </div>
        <!-- END SIDEBAR -->
   </div>
   <!-- END SIDEBAR -->