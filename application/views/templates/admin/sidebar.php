<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin'); ?>">
        <div class="sidebar-brand-icon">
            <i class="fas fa-user-tie"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ADMIN</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- QUERY MENU -->
    <?php
    $role_id = $this->session->userdata('role_id');
    $queryMenu = "SELECT `t_user_menu`.`id`, `menu`, `menu_icon`
                            FROM `t_user_menu` JOIN `t_user_access_menu`
                              ON `t_user_menu`.`id` = `t_user_access_menu`.`menu_id`
                           WHERE `t_user_access_menu`.`role_id` = $role_id
                           AND   `t_user_menu`.`id` != 2
                        ORDER BY `t_user_access_menu`.`menu_id` ASC
                        ";
    $menu = $this->db->query($queryMenu)->result_array();
    ?>


    <!-- LOOPING MENU -->
    <?php foreach ($menu as $m) : ?>
        <!-- <div class="sidebar-heading">
            <?= $m['menu']; ?>
        </div> -->

        <!-- SIAPKAN SUB-MENU SESUAI MENU -->
        <?php
        // $menuId = $m['id'];
        $menuId = $m['id'];
        $querySubMenu = "SELECT *
                               FROM `t_user_sub_menu` JOIN `t_user_menu` 
                                 ON `t_user_sub_menu`.`menu_id` = `t_user_menu`.`id`
                              WHERE `t_user_sub_menu`.`menu_id` = $menuId
                                AND `t_user_sub_menu`.`is_active` = 1
                        ";
        $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse<?= $m['menu']; ?>" aria-expanded="true" aria-controls="collapse<?= $m['menu']; ?>">
                <i class="<?= $m['menu_icon']; ?>"></i><span class="sidebar-heading text-white"><?= $m['menu']; ?></span>
            </a>

            <?php foreach ($subMenu as $sm) : ?>
                <div id="collapse<?= $m['menu']; ?>" class="collapse" aria-labelledby="heading<?= $m['menu']; ?>" data-parent="#accordionSidebar">
                    <div class="bg-white collapse-inner" style="margin: 0;">
                        <a class="collapse-item" href="<?= base_url($sm['url']); ?>">
                            <i class="<?= $sm['icon']; ?>"></i>
                            <span><?= $sm['title']; ?></span></a>
                    </div>
                </div>
            <?php endforeach; ?>
        </li>

        <hr class="sidebar-divider" style="margin: 0;">

    <?php endforeach; ?>

    <li class="nav-item mt-3">
        <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End  of Sidebar -->