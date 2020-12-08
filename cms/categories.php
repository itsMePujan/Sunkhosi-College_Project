<?php 
    require $_SERVER['DOCUMENT_ROOT'].'/config/init.php';
    loggedin_check();    
    require CMS_CSS;
 	require SIDE_TOP;
 	require HEADER;
 	flash();
    $category = new Category();    
    $category_name = $category->getAllCategory();
    $sub_name = $category->getAllsub();
 //   debug($category_name);
    echo TITLE;
      ?>
<!-- FORM -->
<div class="col-md-12">
            <div class="overview-wrap">
            <h2 class="title-1">MAIN CATEGORIES</h2>              
            <a href="category_edit.php" class="au-btn au-btn-icon au-btn--blue">
                <i class="zmdi zmdi-plus"></i> Add 
            </a>
         </div><br>
         <div class="table-responsive table--no-card m-b-40">
               <table class="table table-borderless table-striped table-earning">
                   <thead>
                       <tr>
                           <th class="text-center">S . N</th>
                           <th class="text-center">Category Name</th>
                           <th class="text-center">Status</th>    
                           <th class="text-right"> Is Main</th>                       
                           <th class="text-right"> Created At</th>
                           <th class="text-right"> Updated At</th>
                       </tr>
                   </thead>
                   <tbody>
                    <?php 
                        if($category_name)
                        {
                          foreach ($category_name as $key=> $data) 
                        	{                  
	                            ?>
		                       		<tr>
			                           <td class="text-center"><?php echo $key+1  ?></td>
			                           <td class="text-center"><?php echo $data->category_name  ?></td>
			                           <td class="text-center"><?php echo $data->status  ?></td>
                                 <?php 
                                    if($data->is_main){
                                      ?>
                                        <td class="text-center"><?php echo "YES";  ?></td>
                                      <?php
                                    }else{
                                      ?>
                                      <td class="text-center"><?php echo "NO" ; ?></td>
                                      <?php
                                    }
                                  ?>
                                 <td class="text-center"><?php echo $data->created_at  ?></td>
                                 <?php
                                 if($data->updated_at){
                                  ?>
                                 <td class="text-center"><?php echo $data->updated_at  ?></td>
                                 <?php
                                 }else{
                                ?>
                                <td class="text-center">Not updated</td>
                                <?php 
                             }
                              ?>
                          	</tr>
	                            <?php
                          	}
                        }
                     ?>

                   </tbody>
               </table>
        </div>
</div>
<div class="col-md-12">
            <div class="overview-wrap">
            <h2 class="title-1">properties</h2>              
         </div><br>
         <div class="table-responsive table--no-card m-b-40">
               <table class="table table-borderless table-striped table-earning">
                   <thead>
                       <tr>
                           <th class="text-center">S . N</th>
                           <th class="text-center">Category Name</th>
                           <th class="text-center">Status</th>    
                           <th class="text-right"> Is Sub</th>                       
                           <th class="text-right"> Created At</th>
                           <th class="text-right"> Updated At</th>
                           <th class="text-right"> Action</th>
                       </tr>
                   </thead>
                   <tbody>
                    <?php 
                        if($sub_name)
                        {

                          foreach ($sub_name as $key=> $data1) 
                          {                  
                              ?>
                              <tr>
                                 <td class="text-center"><?php echo $key+1  ?></td>
                                 <td class="text-center"><?php echo $data1->category_name  ?></td>
                                 <td class="text-center"><?php echo $data1->status  ?></td>
                                 <?php 
                                    if($data1->is_sub){
                                      $get_parent_cat = $category->getparentCatsById($data1->is_sub);
                                      //debug($get_parent_cat[0]->category_name);
                                      ?>
                                        <td class="text-center"><?php echo  "YES(".$get_parent_cat[0]->category_name.")"   ?></td>
                                      <?php
                                    }else{
                                      ?>
                                      <td class="text-center"><?php echo "NO" ; ?></td>
                                      <?php
                                    }
                                  ?>
                                 <td class="text-center"><?php echo $data1->created_at  ?></td>
                                 <?php
                                 if($data1->updated_at){
                                  ?>
                                 <td class="text-center"><?php echo $data1->updated_at  ?></td>
                                 <?php
                                 }else{
                                ?>
                                <td class="text-center">Not updated</td>
                                <?php 
                             }
                              ?>
                                 <td>
                                    <div class="table-data-feature  menuDat">                               
                                        <a href="category_edit.php?id=<?php echo $data1->id;?>" class="item">
                                            <i class="zmdi zmdi-edit"></i>
                                        </a> 
                                        <a href="process/category_update.php?id=<?php echo $data1->id;?>" class="item"   onclick="return confirm('Are you sure you want to delete this category?')">
                                          <i class="zmdi zmdi-delete"></i>
                                        </a>
                                    </div>
                                </td>
                              </tr>
                              <?php
                            }
                        }
                     ?>

                   </tbody>
               </table>
        </div>
</div>
                
 	<?php 
    require CMS_JS;


 