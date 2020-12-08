<?php
    require $_SERVER['DOCUMENT_ROOT'].'/config/init.php';    
    $user = new User();


	if(isset($_GET)&& !empty($_GET) && $_GET['name']=='submit')
    {    	
    	/*cr_pass=current password*/
    	$cr_pass=$_POST['current_password'];    	
    	debug($cr_pass);
    	$data=array('id' => ($_SESSION['user_id']),
    				'password'=>sanitize($_POST['re_password'])
    	);


    	$u_id = ($data['id']) ? (int)$data['id'] : '';  

    	$new_pass=$_POST['new_password'];
    	$re_pass=$_POST['re_password'];   	     	
    	$check_id=$user->getUserById($u_id);  
    	if($check_id)
    	{	    
    		if($check_id[0]->password==$cr_pass)    
    		{
    			if($new_pass==$re_pass)
    			{   
	    			if($new_pass!=''&&$re_pass!='') 			
	    			{
	    				$u_id = $user->updateUser($data, $u_id);    					
	    				redirect('../setting.php','success','Credential changed successfully');		
	    			}
	    			else
	    			{
	    				redirect('../setting.php','error','Please enter new password');
		    		}
	    		}
	    		else
	    		{    	
	    			redirect('../setting.php','error','New pass doesnt match');
	    		}    			
		    	redirect('../setting.php','error','Enter new password');    
    		}
    		else	
    		{
    			redirect('../setting.php','error','Current password doesnt match');
    		}
    	}    	
    	else
    	{    	   
    		redirect('../setting.php','error','Current password doesnt match');
    	}
    	
    }

    else if(isset($_POST) && !empty($_POST))
    {
    	/*echo $_SESSION['user_id'];
        debug($_POST);
        */
         $data1 = array(
         	'id'=> ($_SESSION['user_id']),
            'name' => sanitize($_POST['name']),
            'email' => sanitize($_POST['email_input']),
            'phone_number' => sanitize($_POST['phone_number']),
            'address' => sanitize($_POST['address'])
        );

         $user_id = ($data1['id']) ? (int)$data1['id'] : '';    
         
        if($user_id)
        {               
            $act = "updat";
            $user_id = $user->updateUser($data1, $user_id); 
        }
            if(isset($_FILES,$_FILES['image']) && !empty($_FILES['image']['error']==0)) {
             $dir=PROJECT_PATH.'/uploads/users/'.sanitize($_POST['email_input']);
              //debug($dir,true);
             $filename= uploadSingleImage($_FILES['image'],$dir);
            //debug($_FILES['image'],true);
              $data=array(
                 'image' =>$filename                                 
                         );    
            $final=@$user->updateUser($data, $user_id);
             //debug($filename);
             //debug($data);
             //debug($final,true);

            if($final){
                redirect('../setting.php','success','User '.$act.'ed Successfully! ');

            }else{
                redirect('../setting.php','error','Error While '.$act.'ing User <strong>Retry</strong>');
            }
        }
        if($user_id)
        {
            redirect('../setting.php','success','User '.$act.'ed successfully.');  
     
        }else 
        {
            redirect('../setting.php','error','Sorry! There was problem while '.$act.'ing Information.'); 
        }
	}
     