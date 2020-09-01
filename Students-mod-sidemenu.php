
 <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">

                    <!-- User -->
                    <div class="user-box">
                        <div class="user-img">
                            <?php 

                            $sql = 'SELECT `profile_picture` FROM `ad_admission` WHERE `e_mail` like\''.$_SESSION['e_mail'].'\'';
                            $result = mysqli_query(connect_db(),$sql);
                            $row = mysqli_fetch_assoc($result);
                            $img = $row['profile_picture'];
                             ?>
                            <img src="<?php echo $img; ?>" alt="M.E.B School" title="M.E.B School" class="img-circle img-thumbnail img-responsive">
                            <div class="user-status offline"><i class="zmdi zmdi-dot-circle"></i></div>
                        </div>
                        <h5><a href="#"> <?php echo $_SESSION['name']; ?> </a> </h5>
                        <ul class="list-inline">
                            <li>
                                <a href="Students-mod-profile.php">
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

                            <li class="active">
                                <a href="Students-mod-video-lecture.php" class="waves-effect"><i class="fa fa-video-camera"></i> <span>  Video Lecture </span> </a>
                            </li>

                            
                             <li>
                                <a href="Students-mod-homework.php" class="waves-effect"><i class="fa fa-book"></i> <span> Homework
                                 </span> </a>
                            </li>

                            <li>
                                <a href="Students-mod-report-card.php" class="waves-effect"><i class="fa fa-vcard"></i> <span> Report Card </span> </a>
                            </li>

                            <li>
                                <a href="Students-mod-blog.php" class="waves-effect"><i class="zmdi zmdi-blogger"></i> <span> Blog </span> </a>
                            </li>


                            <li>
                                <a href="Students-mod-forum.php" class="waves-effect"><i class="zmdi zmdi-account-box"></i> <span> Forum
                                 </span> </a>
                            </li>
                            <li>
                                <a href="Students-mod-feedback.php" class="waves-effect"><i class="fa fa-wpforms"></i> <span> Feedback Form
                                 </span> </a>
                            </li>



                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        
                    
                    <!-- Sidebar -->
 