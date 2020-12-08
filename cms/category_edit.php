<?php 
    require $_SERVER['DOCUMENT_ROOT'].'/config/init.php';
    loggedin_check();    
    require CMS_CSS;
 	require SIDE_TOP;
 	require HEADER;
 	flash();
    $category = new Category();    
    $category_name = $category->getAllCategory();
    $maincat= $category->getMaincat(1);
    $act = "add";	    
     if(isset($_GET) && !empty($_GET))
	{
		// echo "sub Cat";
		// print_r($_GET);
		$get_cat_by_id = $category->getCategoryById($_GET['id']); 
		$get_parent_cat = $category->getparentCatsById($get_cat_by_id[0]->is_sub);
		// debug($get_parent_cat[0]->category_name);
		$act = "Update";
	    $id = (int)$_GET['id'];
	    //debug($id);
	    if($id <= 0)
	    {
	       redirect('categories.php','error','Category id is not valid');
    	}    	
    	$cat_info = $category->getCategoryById($id);
    	/*echo "<pre>";
		print_r($cat_info);
		echo "</pre>";*/
 		if(!$cat_info)
	    {
	        redirect('categories.php','error','Category not found.');
	    }  
	}    
	echo TITLE;  	
 	?>
<!--Add category-->
    	<div class="row addCategory" >
          	<div class="col-md-12" align="center">
          		<form action="<?php echo CMS_URL.'/process/category_update.php' ?>" method="post" enctype="multipart/form-data" class="form">
	           	  <div class="overview-wrap" align="center">             
	              </div><br>
	                <div class="col-lg-7" align="center">
	                    <div class="card" >
	                         <div class="card-header"><strong><?php echo ucfirst($act);?> Category</strong></div>
	                        <div class="card-body">
	                            <div class="form-group has-success">   
									<div class="col-md-11"> 
	                            		<p align="left" class="col-lg-12">Category</p> 
	                                    <select name="Main_Cat_id" required id="status" class="form-control" >
	                                    	<?php 
	                                    		if($maincat){
	                                    			foreach($maincat as $key => $maincatdata) {
	                                    				?>
														<option value="<?php echo isset($get_parent_cat) && $get_parent_cat[0]->id == $maincatdata->id ? $get_parent_cat[0]->id : $maincatdata->id ?>" 
														<?php echo isset($get_parent_cat) && $get_parent_cat[0]->category_name == $maincatdata->category_name ? 'selected'  : ''?>
														><?php echo $maincatdata->category_name ?>
														</option>
	                                    				<?php
	                                    			}	
	                                    	}
	                                    	 ?>
	                                    </select> 
	                                </div>
										<div class="col-md-11"> 
	                            		<p align="left" class="col-lg-12">Property</p> 
	                                    <input  name="sub_category_name" value="<?php echo @$cat_info[0]->category_name?>" type="text" class="form-control valid" data-val="true"  aria-invalid="false"> 
	                                </div>
	                                <div class="col-md-11">  
	                            		<p align="left" class="col-lg-12">Status</p> 
	                                    <select name="status" required id="status" class="form-control">
	                                        <option value="active"<?php echo isset($cat_info, $cat_info[0]->status) && $cat_info[0]->status == 'active' ? 'selected' : '' ;?>>Active</option>
	                                        <option value="inactive"<?php echo isset($cat_info, $cat_info[0]->status) && $cat_info[0]->status == 'inactive' ? 'selected' : '' ;?>>In Active</option>
	                                    </select> 
	                                </div>                              
	                                <div class="col-md-11"> 
	                            		<p align="left"	class="col-lg-12"> Summary</p>                                            		
	                                    <textarea name="summary" id="summary" rows="5" style="resize: none;" class="form-control"><?php echo @$cat_info[0]->summary;?></textarea>                                
	                                </div>                                                                   
	                            </div>
	                        </div>
	                        <div>             
	                        	<input type="hidden" name="Sub_Cat_id" value="<?php echo @$cat_info[0]->id;?>">           	
	              	          	<button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" type="submit" ><?php echo ucfirst($act) ?></button>
	              	          	<a href="categories.php" class="btn btn-danger btn-lg btn-block" >
	              	          		<button style="color: white;">Cancel</button>          	
	              	          	</a>
	                        </div>                                               
	                    </div>
	                </div>
            	</form>
            </div>
        </div>         
   	<?php 
    require CMS_JS;