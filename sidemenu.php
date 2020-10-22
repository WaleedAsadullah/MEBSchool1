<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">

        <!-- User -->
        <div class="user-box">
            <div class="user-img">
                <img src="assets/images/users/logo.jpg" alt="M.E.B School" title="M.E.B School"  class="img-circle img-thumbnail img-responsive">
                <div class="user-status offline"><i class="zmdi zmdi-dot-circle"></i></div>
            </div>
            <h5><a href="Accounts-mod-profile.php"> <?php echo $_SESSION['name']; ?> </a> </h5>
            <ul class="list-inline">
                <li>
                    <a href="Accounts-mod-profile.php">
                        <i class="zmdi zmdi-settings"></i>
                    </a>
                </li>

                <li>
                    <a href="logout.php" class="text-custom">
                        <i class="zmdi zmdi-power"></i>
                    </a>
                </li>
            </ul>
        </div>
        <!-- End User -->

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul>
                <li class="text-muted menu-title">Navigation</li>


        <?php

        
        include_once("db_functions.php");
        $conn = connect_db();

        $sql = 'SELECT `right_id`, `user_type_id`, `user_type`, `form_name`, `icon`, `form_prioirty`, `form_location`, `insert_form`, `edit_form`, `delete_form` FROM `rights` WHERE `user_type` = \''.$_SESSION['type'].'\' order by `form_prioirty` DESC';
        // echo $sql;
        $result = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_assoc($result)){
        	echo '<li>
                    <a href="'.$row['form_location'].'" class="waves-effect"><i class="'.$row['icon'].'"></i> <span> '.$row['form_name'].'</span> </a>
                </li>';
        }
        ?>

            </ul>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
        
        <!-- Sidebar -->
