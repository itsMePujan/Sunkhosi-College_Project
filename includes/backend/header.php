       <?php 
       $contact =  new Contact();
       $getnonSeen = $contact->getNS();
       $getAll = $contact->getAll();
    // /   debug($getAll    );
        ?>
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-comment-more"></i>
                                        <span class="quantity"><?php echo $getnonSeen[0]->Count; ?></span>
                                          <div class="mess-dropdown js-dropdown">
                                             <div class="mess__title">
                                                <p>You have <?php echo $getnonSeen[0]->Count; ?> news message</p>
                                            </div>
                                                 <?php 
                                            if($getAll){
                                                foreach ($getAll as $key => $data) {
                                                    ?>                                                                     
                                            <div class="mess__item" onclick="myhref('<?php echo CMS_URL.'/contact.php' ?>');"  >
                                                <div class="content" >
                                                    <h6><?php echo $data->name; ?></h6>
                                                    <p><?php echo $data->subject; ?></p>
                                                    <span class="time"><?php echo $data->Date; ?></span>
                                                </div>
                                            </div>
                                                    <?php
                                                }
                                            }
                                             ?>
                                           <div class="mess__footer">
                                                 <a href="<?php echo CMS_URL.'/contact.php' ?>" >View All Messages</a>
                                            </div>
                                            </div>
                                    </div>
                                </div>
                            </div>

                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap"> 
                                </div>
                                <?php 
                                $user = new User;//user_id
                                $userinfo = $user->getUserById($_SESSION['user_id']);
                                ?>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                          <?php 
                                          if($userinfo[0]->image){
                                            $ppname =$userinfo[0]->image;
                                            ?>
                                            <img src="<?php echo UPLOAD_DIR.'/users/'.@$userinfo[0]->email.'/'.$ppname; ?>" alt="John Doe" />
                                            <?php
                                        }else{
                                            $ppname='user-default.jpg';
                                            ?>
                                            <img src="<?php echo UPLOAD_DIR.'/users/'.$ppname; ?>" alt="John Doe" />
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="content">
                                        <a class="js-acc-btn" href="#"><?php echo @$userinfo[0]->name; ?></a>
                                    </div>
                                    <div class="account-dropdown js-dropdown">
                                        <div class="info clearfix">
                                            <div class="image">
                                                <a href="#">
                                                    <?php 
                                                    if($userinfo[0]->image){
                                                        $ppname =$userinfo[0]->image;
                                                        ?>
                                                        <img src="<?php echo UPLOAD_DIR.'/users/'.@$userinfo[0]->email.'/'.$ppname; ?>"  />
                                                        <?php
                                                    }else{
                                                        $ppname='user-default.jpg';
                                                        ?>
                                                        <img src="<?php echo UPLOAD_DIR.'/users/'.$ppname; ?>" alt="John Doe" />
                                                        <?php

                                                    }
                                                    ?>
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h5 class="name">
                                                    <a href="#"><?php echo @$userinfo[0]->name; ?></a>
                                                </h5>
                                                <span class="email"><?php echo @$userinfo[0]->email;?></span>
                                            </div>
                                        </div>
                                        <div class="account-dropdown__body">
                                            <div class="account-dropdown__item">
                                                <a href=<?php echo CMS_URL.'/setting.php' ?>>
                                                    <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="<?php echo CMS_URL.'/process/logout.php' ?>">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <script type="text/javascript">
    function myhref(web){
      window.location.href = web;}
</script>
                <!-- HEADER DESKTOP-->

                <!-- MAIN CONTENT-->
                <div class="main-content">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">