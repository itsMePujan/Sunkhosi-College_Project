    <?php 
    	require $_SERVER['DOCUMENT_ROOT'].'/config/init.php';
  	  	loggedin_check();
    	require CMS_CSS;
     	require SIDE_TOP;
 		require HEADER;		
 		 flash();
 		//require CMS_JS;	
 		$user = new User();
 		
if(isset($_SESSION, $_SESSION['user_id']) && !empty($_SESSION['user_id'])){

    $id = $_SESSION['user_id'];
    if($id <= 0){
        redirect('./dashboard.php','error','User id is not valid');
    }

    $user_info = $user->getUserById($id);

    if(!$user_info){
        redirect('/dashboard.php','error','User not found.');
    }
		}
    ?>    
    <!-- profile_fluid -->
    <div class="container" align="center" >
 			<div class="col-md-4">
              <div class="card" style="">
                  <div class="card-body">
                      <div class="mx-auto d-block" >
             	         <?php 
              	        if(@$user_info[0]->image){
              	          $ppname =$user_info[0]->image;
              	          ?>
              	          <img class="rounded-circle mx-auto d-block" style="width:150px; height: 150px;" src="<?php echo UPLOAD_DIR.'/users/'.@$user_info[0]->email.'/'.$ppname; ?>"  >
              	          <?php
              	          }else{
              	              $ppname='user-default.jpg';
              	            ?>
              	           <img class="rounded-circle mx-auto d-block" style="width:50px; height: 50px;" src="<?php echo UPLOAD_DIR.'/users/'.$ppname; ?>"  >
                            <?php
		                        }						
		                       		?>
                          <h5 class="text-sm-center mt-2 mb-1"><?php echo @$user_info[0]->name; ?></h5>
                          <div class="location text-sm-center">
                              <i class="fa fa-map-marker"></i><?php echo ' '.''.@$user_info[0]->address;?></div>
                       	  <div class="location text-sm-center">
                              <i class="fa fa-phone-square"></i><?php echo ' '.''.@$user_info[0]->phone_number;?></div>
                     	 </div>

                      <hr>
                      <div class="card-text text-sm-center">
						<button type="button" class="btn btn-outline-success btn-lg btn-block" type="submit" onclick="show()">Update Info</button>
						<button type="button" class="btn btn-outline-secondary btn-lg btn-block" onclick="showCredentials()">Update Credentials</button>
                      </div>

                  </div>
                  <div class="card-footer">
                      <strong class="card-title mb-3">Profile Card</strong>
                  </div>
              </div>
          </div>
    </div>

    <!-- end of profile fluid -->
    	  <!--setting update update crediantial-->
    <div class="container CCredentials">
   	 	<div class="row show_update_information" align="center" style="padding-right: 30%; padding-left: 30%">
		    <div class="col-lg">
		         <div class="card">
		             <div class="card-header">
		                 <strong><h5>Update</h5></strong><h3>Credentials</h3>
		             </div>
		             <?php flash(); ?>
		             <div class="card-body card-block">
		                 <form action="process/setting_update.php?name=<?php echo 'submit'?>" method="post" enctype="multipart/form-data" class="form-horizontal">		                  
		                     <div class="row form-group">
		                         <div class="col col-md-3">
		                             <label for="text-input" class=" form-control-label">Current Password</label>  
		                         </div>  
		                         <div class="col-12 col-md-9">
		                             <input type="password" id="text-input" name="current_password" placeholder="Current Password" class="form-control">
		                         </div> 
		                     </div>
		                       <div class="row form-group">
		                         <div class="col col-md-3">
		                             <label for="text-input" class=" form-control-label">New Password</label>  
		                         </div>  
		                         <div class="col-12 col-md-9">
		                             <input type="Password" id="text-input" name="new_password" placeholder="New Password" class="form-control">
		                         </div> 
		                     </div>
		     				 <div class="row form-group">
		                         <div class="col col-md-3">
		                             <label for="text-input" class=" form-control-label">Re-Password</label>  
		                         </div>  
		                         <div class="col-12 col-md-9">
		                             <input type="Password" id="text-input" name="re_password" placeholder="ReType-Password" class="form-control">
		                         </div> 
		                     </div>
		                     	<div class="card-footer" align="right">
				                 	<button type="submit" class="btn btn-primary btn-sm" onclick="hide();">
				                    	 <i class="fa fa-dot-circle-o"></i> Submit
				                	 </button>
				                	<button type="button" class="btn btn-danger btn-sm" onclick="hideCredentials()">
				                    	 <i class="fa fa-dot-circle-o"></i> Cancel
				                 	</button>
				             	</div>
		                 </form>
		             </div>		            
		         </div>
		     </div>
	    </div>
    </div>
	<!--Setting update credi-->  
    <!--setting update info-->
    <div class="container CInformation">
    <div class="row show_update_information " align="center" style="padding-right: 30%; padding-left: 30%">
	    <div class="col-lg">
	         <div class="card">
	             <div class="card-header">
	                 <strong><h5>Update</h5></strong><h3>Information</h3>
	             </div>
	             <?php flash(); ?>
	             <div class="card-body card-block">
	                 <form action="process/setting_update.php" method="post" enctype="multipart/form-data" class="form-horizontal">
	                     <div class="row form-group">
	                     </div>
	                     <div class="row form-group">
	                         <div class="col col-md-3">
	                             <label for="text-input" class=" form-control-label">Name</label>  
	                         </div>  
	                         <div class="col-12 col-md-9">
	                             <input type="text" value="<?php echo @$user_info[0]->name?>" id="text-input" name="name" placeholder="First name" class="form-control">
	                         </div> 
	                     </div>
	                     <div class="row form-group">
	                         <div class="col col-md-3">
	                             <label for="email_input" class=" form-control-label">Email</label>
	                         </div>
	                         <div class="col-12 col-md-9">
	                             <input type="email" value="<?php echo @$user_info[0]->email?>" id="email-input" name="email_input" placeholder="Email Address" class="form-control" required>
	                             <small class="help-block form-text">Please enter your email</small>
	                         </div>
	                     </div>  	                  
	                      <div class="row form-group">
	                         <div class="col col-md-3">
	                             <label for="email-input" class=" form-control-label">Phone Number</label>
	                         </div>
	                         <div class="col-12 col-md-9">
	                             <input type="number" value="<?php echo @$user_info[0]->phone_number?>" id="email-input" name="phone_number" placeholder="phone" class="form-control">
	                             <small class="help-block form-text">Phone Number</small>
	                         </div>
	                     </div>  
						<div class="row form-group">
	                         <div class="col col-md-3">
	                             <label for="email-input" class=" form-control-label">Address</label>
	                         </div>
	                         <div class="col-12 col-md-9">
	                             <input type="text" value="<?php echo @$user_info[0]->address?>" id="email-input" name="address" placeholder="Address" class="form-control">
	                             <small class="help-block form-text">Please enter your address</small>
	                         </div>
	                     </div>  
	                     <div class="row form-group">
	                         <div class="col col-md-3">
	                             <label for="file-input" class=" form-control-label">Change Profile Picture</label>
	                         </div>
	                         <div class="col-12 col-md-9">
	                             <input type="file" id="file-input" name="image" class="form-control-file" >
	                         </div>
	                     </div>
	                     <div class="card-footer" align="right">
			                 <button type="submit" class="btn btn-primary btn-sm" onclick="hide();">
			                     <i class="fa fa-dot-circle-o"></i> Submit
			                 </button>
			                <button type="button" class="btn btn-danger btn-sm" onclick="hide();">
			                     <i class="fa fa-dot-circle-o"></i> Cancel
			                 </button>
			             </div>
	                 </form>
	             </div>
	             
	         </div>
	     </div>
    </div>
    </div>
	<!--Setting-->  
 		<?php
 		require CMS_JS;
    ?>

    <script >		
    	  window.onload=function(){
        $('.CInformation').hide(); 
        $('.CCredentials').hide(); 
         }

     
    function hide(){
                $('.CInformation').slideUp();
            }
    function show(){
                $('.CInformation').slideDown();
            }
    function showCredentials(){
                $('.CCredentials').slideDown();
    }
    function hideCredentials(){
                $('.CCredentials').slideUp();
    }


    </script>
