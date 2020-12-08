<?php 
    require $_SERVER['DOCUMENT_ROOT'].'/config/init.php';
    loggedin_check();
    debug($_POST);
    $personal_info= new PersonalInfo();
    if($_POST['Action']){
    	    		$data = array(
				'Name'=>sanitize($_POST['Name']),
    			'FathersName'=>sanitize($_POST['FathersName']),
    			'MothersName'=>sanitize($_POST['MothersName']),
    			'CitizenshipNo'=>$_POST['CitizenshipNo'],
    			'Address'=>sanitize($_POST['Address']),
    			'Contact'=>$_POST['Contact'],
    			'DateOfBirth'=>$_POST['DateOfBirth'],
    			'Gender'=>sanitize($_POST['Gender']),
    			'Religion'=>sanitize($_POST['Religion']),
    			'Profession'=>sanitize($_POST['Profession']),
    			'IsAlive'=>sanitize($_POST['IsAlive']),
    			'LiteracyStatus'=>sanitize($_POST['LiteracyStatus']),
    			'UploadedBy'=>($_SESSION['user_id'])
        );
            	if($_POST['Action']=='Insert'){
    		$success=$personal_info->addPersonalInformation($data);
    		if($success){
    				redirect(CMS_URL.'/personal_info_add.php','success','Personal information Added Successfully');
    		}else{
    				redirect(CMS_URL.'/personal_info_add.php','success','Problem while Updationg Personal Information');
    		}
        //
    	}else if(($_POST['Action']=='Update')){
            $value=$_POST['value'];
            $str_arr = explode(",", $value);
            $id= $str_arr[0];
            if($_POST['value'] == $id.',Delete'){
                $success=$personal_info->DeleteDataById($id);
                if($success){
                    redirect(CMS_URL.'/personal_info_add.php','success','Personal information Deleted Successfully');
                    }else{
                    redirect(CMS_URL.'/personal_info.php','success','Problem while Deleting Personal Information');
                    }
            }            
    		$idValid = $personal_info->validid($_POST['value']);
    			$success=$personal_info->UpdatePersonalInformation($data,$_POST['value']);
    			if($success){
    				redirect(CMS_URL.'/personal_info_add.php?id='.$_POST['value'],'success','Personal information Updated Successfully');
    				}else{
    				redirect(CMS_URL.'/personal_info_add.php?id='.$_POST['value'],'success','Problem while Updating Personal Information');
    				}		
    		}else{
    				redirect(CMS_URL.'/personal_info_add.php?id='.$_POST['value'],'error','Personal info Not Found or  Deleted ! try to refresh');	
    		}
        // 		 
    	}else{
			redirect(CMS_URL.'/personal_info_add.php?id='.$_POST['value'],'error','Easter Egg');	
    	}
 ?>