<?php
    require $_SERVER['DOCUMENT_ROOT'].'/config/init.php';      
    $category = new Category();

    if(isset($_POST)&&!empty($_POST))
    {
    	$data = array(
            'category_name' => sanitize($_POST['sub_category_name']),
            'status' => sanitize($_POST['status']),
            'summary' => sanitize($_POST['summary']),
            'added_by' => $_SESSION['user_id'],
            'is_sub' => $_POST['Main_Cat_id']
        );           
        $cat_id = (isset($_POST, $_POST['Sub_Cat_id'])) ? (int)$_POST['Sub_Cat_id'] : '';       
        if($cat_id)
        {    
            $act = "updat";
            if($_POST['sub_category_name']!='')
            {
            	$cat_id = $category->updateCategory($data, $cat_id);
            }
            else
            {          
            	redirect('../category_edit.php?id='.$cat_id,'error','Please insert title');

            }
        }
        else 
        { 
        	if($_POST['sub_category_name']!='')
        	{
            	$act = 'add';
            	$cat_id = $category->addCategory($data);
            }
            else
            {            	
            	redirect('../category_edit.php','error','Please insert title');

            }
        }
        if($cat_id){

            redirect('../categories.php','success','Category '.$act.'ed successfully.');
        } 
        else
        {
            redirect('../category_edit.php','error','Title already exist');
        }        
    }
    elseif(isset($_GET, $_GET['id']) && !empty($_GET['id']))
    {   	
        $id = (int)$_GET['id'];            
        if($id <= 0)
        {
            redirect('../categories.php','error','Invalid Category Id');
        }
        $cat_info = $category->getCategoryById($id);
        if(!$cat_info)
        {
            redirect('../categories.php','error','Category already deleted or does not exists.');
        }
        $del = $category->deleteCategory($id);
        if($del)       
        {
            redirect('../categories.php','success','Category deleted successfully.');
        }else{
            redirect('../categories.php','error','Sorry! There was problem while deleting category.');
        }
    }

   