    <?php 
    require $_SERVER['DOCUMENT_ROOT'].'/config/init.php';
    require CMS_CSS;
    if(isset($_SESSION, $_SESSION['token']) && !empty($_SESSION['token'])){
    redirect('dashboard.php','success', 'You are already logged in.');
            }
    if(isset($_COOKIE, $_COOKIE['_au']) && !empty($_COOKIE['_au'])){
    redirect('dashboard.php','success', 'Welcome back to admin panel.');
      }

    ?>
<title>L0GIN</title>
<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                                <?php  flash();  ?>
                    <div class="login-content">

                        <div class="login-logo">
                            <a href="#">
                                <h1><?php echo Company_Name; ?></h1>
                            </a>
                        </div>
                        <div class="login-form">

                            <form action="process/login_process.php" method="POST">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password" required >
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">Remember Me
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php 
    require CMS_JS;
 ?>
 <script>
    window.onload=function(){
        $('.row').hide();
            } 
         </script>