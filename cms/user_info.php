<?php 
    require $_SERVER['DOCUMENT_ROOT'].'/config/init.php';
    loggedin_check();
    require CMS_CSS;
  require SIDE_TOP;
  require HEADER;
 $user = new User();
 $user_info=$user->getAllUser();
  ?>
  <?php flash();?>
<div class="col-md-12">
    <div class="overview-wrap">
    <h2 class="title-1">Side Banner</h2>
     <a href="add_ads.php" class="au-btn au-btn-icon au-btn--blue">
        <i class="zmdi zmdi-plus"></i> Add 
     </a>
 </div><br> 

<div class="row">
<!-- side  Banner-->
    
    <?php 
        if ($user_info) {
        foreach ($user_info as $key => $data) {
     ?>
     <div class=" col-sm-0"></div>
    <div class="col-xl-6"> 
        <!-- MAP DATA-->
       <div class="map-data m-b-40">
          <h3 class="title-3 m-b-30">
              <i class="zmdi zmdi-map"></i>Profile</h3>                
               <div class="map-wrap m-t-45 m-b-80">
                        <!-- image -->

             <div id="vmap" style="height: 200px; position: relative; overflow: hidden;"></div>
               </div>
             <div class="table-wrap">
                 <div class="table-responsive table-style1" style="width: 50%;"s>
                     <table class="table">
                         <tbody>
                             <tr>
                                 <td>S.N</td>
                                 <td><?php echo $key+1 ?></td>
                             </tr>
                             <tr>
                                 <td>Name</td>
                                 <td><?php echo $data->name; ?></td>
                             </tr>
                             <tr>
                                 <td>Phone</td>
                                 <td><?php echo $data->phone_number; ?></td>
                             </tr>
                             <tr>
                                 <td>Address</td>
                                 <td><?php echo $data->address; ?></td>
                             </tr>
                              <tr>
                                 <td>Email</td>
                                 <td><?php echo $data->email; ?></td>
                             </tr>
                         </tbody>
                     </table>
                 </div>
                 <div class="table-responsive table-style1">
                     <table class="table">
                         <tbody>
                             <tr>
                                 <td>Status</td>
                                 <td><?php echo $data->status; ?></td>
                             </tr>
                             <tr>
                                 <td>Role</td>
                                 <td><?php echo $data->role; ?></td>
                             </tr>
                             <tr>
                                 <td>Created At</td>
                                 <td><?php echo $data->created_at; ?></td>
                             </tr>
                             <tr>
                                 <td>Updated AT</td>
                                 <?php
                                    if($data->updated_at){ 
                                  ?>
                                 <td><?php echo $data->updated_at; ?></td>
                                 <?php 
                                    }else{
                                        ?>
                                    <td>Not Updated</td>

                                        <?php
                                    }
                                  ?>
                             </tr>

                         </tbody>
                     </table>

                 </div>

             </div>

        </div>                           
        </div>
    <?php 
                    }
        }
     ?>
 
 <!--end of side Banner  -->
</div>
  <?php 
    require CMS_JS;
          