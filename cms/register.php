<?php 
   require $_SERVER['DOCUMENT_ROOT'].'/config/init.php';
    require CMS_CSS;
?>
        <title>Register</title>
<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <?php flash(); ?>   
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <h2> <?php echo Company_Name; ?></h2>
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="<?php echo CMS_URL.'/process/register_process.php'?>" method="POST" enctype="multipart/form-data" >
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input class="au-input au-input--full" type="text" name="full_name" placeholder="Full Name"></div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email"></div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password"></div>
                                <div class="form-group">
                                 <label>Phone</label>
                                 <input class="au-input au-input--full" type="phone" name="phone" placeholder="Phone Number   eg(+977 98********)"> </div>     
                                 <div class="form-group">
                                    <label>Address</label>
                                    <input class="au-input au-input--full" type="address" name="address" placeholder="Address or Location"></div>               
                                 Browse… <input type="file" id="imgInp" name="image">  
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox"  required>Agree the terms and policy
                                    </label></div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">register</button>
                            </form>
                            <div class="register-link">
                                <p>
                                    Already have account?
                                    <a href="index.php">Sign In</a>
                                </p>
                            </div>
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