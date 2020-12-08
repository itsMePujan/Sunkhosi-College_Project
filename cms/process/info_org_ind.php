<?php 
    require $_SERVER['DOCUMENT_ROOT'].'/config/init.php';
    loggedin_check();
    debug($_POST);
    $information= new Information();
    $category = new Category();
    if($_POST['Action']){
    	    $data = array(
				'Name'=>sanitize($_POST['Name']),
    			'OwnerName'=>sanitize($_POST['OwnerName']),
    			'Contact'=>sanitize($_POST['Contact']),
    			'Location'=>$_POST['Location'],
    			'RegestrationNo'=>sanitize($_POST['RegestrationNo']),
    			'EstablishedDate'=>$_POST['EstablishedDate'],
    			'Type'=>$_POST['Type'],
    			'IsBanned'=>sanitize($_POST['IsBanned']),
    			'Is_Indrustrial'=>sanitize($_POST['Is_Indrustrial']),
    			'EmployeeCount'=>sanitize($_POST['EmployeeCount']),
    			'IsPresent'=>sanitize($_POST['IsPresent']),
    			'UploadedBy'=>($_SESSION['user_id'])

        );
            $Category_data = array(
            'category_name' => sanitize($_POST['Name']),
            'summary' => sanitize($_POST['Name'].' is the Property'),
            'added_by' => $_SESSION['user_id'],
            'is_sub' => $_POST['Is_Indrustrial']
        );
        debug($Category_data);
    	if($_POST['Action']=='Insert'){
    		$success=$information->addInformation($data);
            $category_success = $category->addCategory($Category_data);
    		if($success && $category_success){
    				redirect(CMS_URL.'/info_org_ind_add.php','success',' information Added Successfully');
    		}else{
    				redirect(CMS_URL.'/info_org_ind_add.php','success','Problem while Adding  Information');
    		}
        //
    	}else if(($_POST['Action']=='Update')){
            $value=$_POST['value'];
            $str_arr = explode(",", $value);
            $id= $str_arr[0];
            if($_POST['value'] == $id.',Delete'){
                $success=$information->DeleteDataById($id);
                if($success){
                    redirect(CMS_URL.'/info_org_ind_add.php','success','information Deleted Successfully');
                    }else{
                    redirect(CMS_URL.'/info_org_ind_add.php','success','Problem while Deleting  Information');
                    }
            }            
    		  $idValid = $information->validid($_POST['value']);
    			$success=$information->UpdateInformation($data,$_POST['value']);
    			if($success){
    				redirect(CMS_URL.'/info_org_ind_add.php?id='.$_POST['value'],'success','information Updated Successfully');
    				}else{
    				redirect(CMS_URL.'/info_org_ind_add.php?id='.$_POST['value'],'success','Problem while Updating  Information');
    				}		
    		}else{
    			
    				redirect(CMS_URL.'/info_org_ind_add.php','error','Information Not Found or  Deleted ! try to refresh');	
    		}
        // 		 
    	}else{
			redirect(CMS_URL.'/info_org_ind_add.php','error','Easter Egg');	
    	}
 ?>