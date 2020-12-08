<?php 
    require $_SERVER['DOCUMENT_ROOT'].'/config/init.php';
    loggedin_check();
    debug($_POST);
    $News= new NewsEvent();
    if($_POST['Action']){
    	    	$data = array(
				'title'=>sanitize($_POST['title']),
    			'description'=>sanitize($_POST['description']),
    			'image'=>sanitize($_POST['image']),
    			'NorE'=>$_POST['NorE'],
    			'UploadedBy'=>($_SESSION['user_id'])
        );
         if($_POST['Action']=='Insert'){
         	debug($_POST['Action']);
    		$success=$News->addInformation($data);
    		if($success){
    				redirect(CMS_URL.'/newsandevent_add.php','success','Personal information Added Successfully');
    		}else{
    				redirect(CMS_URL.'/newsandevent_add.php','success','Problem while Updationg Personal Information');
    		}
        //
    	}else if(($_POST['Action']=='Update')){
            $value=$_POST['value'];
            $str_arr = explode(",", $value);
            $id= $str_arr[0];
            if($_POST['value'] == $id.',Delete'){
                $success=$News->DeleteDataById($id);
                if($success){
                    redirect(CMS_URL.'/newsandevent.php','success','News or Events Deleted Successfully');
                    }else{
                    redirect(CMS_URL.'/newsandevent.php','success','Problem while Deleting News or Events');
                    }
            }            
    		$idValid = $News->validid($_POST['value']);
    			$success=$News->UpdateInformation($data,$_POST['value']);
    			if($success){
    				redirect(CMS_URL.'/newsandevent_add.php?id='.$_POST['value'],'success','News or Events Updated Successfully');
    				}else{
    				redirect(CMS_URL.'/newsandevent_add.php?id='.$_POST['value'],'success','Problem while Updating News or Events');
    				}		
    		}else{
    				redirect(CMS_URL.'/newsandevent_add.php?id='.$_POST['value'],'error','News or Events Not Found or  Deleted ! try to refresh');	
    		}
        // 		 
    	}else{
			redirect(CMS_URL.'/newsandevent_add.php?id='.$_POST['value'],'error','Easter Egg');	
    	}
 ?>