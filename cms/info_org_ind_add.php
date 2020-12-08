<title>Indrustrial and Organizational information || Sunkoshi Rural Municipality</title>
<?php 
    require $_SERVER['DOCUMENT_ROOT'].'/config/init.php';
    loggedin_check();
    require CMS_CSS;
    require SIDE_TOP;
    require HEADER;
    $information = new Information();
    $category = new Category();
    $category_name = $category->getAllCategory();
    $maincat= $category->getMaincat(1);
    if(@$_GET['id']){
        @$allInfo = $information->getallinformation($_GET['id']);
        debug(@$allInfo);
    }
     flash();
    ?>
    <?php flash(); ?>
    <div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3>&nbsp  <?php echo isset($_GET['id'])!=''? 'Update' : 'Add';?> Indrustrial and Organizational information  </h3>
        </div>
        <div class="card-body card-block">
            <form action="<?php echo CMS_URL.'/process/info_org_ind.php' ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                <input type="hidden" name="Action" value="<?php echo isset($_GET['id'])!=''? 'Update' : 'Insert';?>">
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label class=" form-control-label">Owner Name</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" id="OwnerName" name="OwnerName" value="<?php echo @$allInfo[0]->OwnerName; ?>" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label  class=" form-control-label">Location(Address)</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" id="Location" name="Location" value="<?php echo @$allInfo[0]->Location; ?>" class="form-control">
                    </div>
                    <div class="col col-md-3">
                        <label  class=" form-control-label">Regestration NO:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" id="RegestrationNo" name="RegestrationNo" value="<?php echo @$allInfo[0]->RegestrationNo; ?>" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="Contact" class=" form-control-label">Contact:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="number" id="Contact" name="Contact" value="<?php echo @$allInfo[0]->Contact; ?>" class="form-control">
                    </div>
                    <div class="col col-md-3">
                        <label  class=" form-control-label">Date of Established :</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="date"  id="EstablishedDate" name="EstablishedDate" value="<?php echo @$allInfo[0]->EstablishedDate; ?>" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label  class=" form-control-label">Type :</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <select name="Type" id="Type" class="form-control">
                            <option value="Government" <?php echo @$allInfo[0]->Type == 'Government' ? 'selected' : '' ;?>>Government</option>
                            <option value="Private" <?php echo @$allInfo[0]->Type == 'Private' ? 'selected' : '' ;?> >Private</option>
                        </select>
                    </div>
                    <div class="col col-md-3">
                        <label  class=" form-control-label">Status :</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <select name="IsBanned" id="IsBanned" class="form-control">
                            <option value="Banned" <?php echo @$allInfo[0]->IsBanned == 'Banned' ? 'selected' : '' ;?> >Banned</option>
                            <option value="Not Banned" <?php echo @$allInfo[0]->IsBanned == 'Not Banned' ? 'selected' : '' ;?> >Not-Banned</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label  class=" form-control-label">I or O</label>
                    </div>
                    <div class="col-12 col-md-3">
                         <select name="Is_Indrustrial" required id="status" class="form-control" >
                                <?php 
                                    if($maincat){
                                        foreach($maincat as $key => $maincatdata) {
                                            ?>
                                            <option value="<?php echo $maincatdata->id; ?>" <?php echo @$allInfo[0]->Is_Indrustrial == $maincatdata->id ? 'selected': '' ; ?> ><?php echo $maincatdata->category_name; ?></option>
                                            <?php 
                                        }
                                    }
                                             ?>
                                        </select>                    
                    </div>
                    
                  <div class="col col-md-3">
                        <label for="Name" class=" form-control-label">Property Name</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" id="Name" name="Name" value="<?php echo @$allInfo[0]->Name; ?>" class="form-control">
                    </div>

                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label  class=" form-control-label">Total Employee :</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="number" id="EmployeeCount" name="EmployeeCount" value="<?php echo @$allInfo[0]->EmployeeCount; ?>" class="form-control">
                    </div>
                    <div class="col col-md-3">
                        <label  class=" form-control-label">Is Present ?</label>
                    </div>
                    <div class="col col-md-3">
                        <select name="IsPresent"  class="form-control">
                             <option value="Present"<?php echo @$allInfo[0]->IsPresent == 'Present' ? 'selected' : '' ;?>>Present</option>
                            <option value="Collapsed"<?php echo @$allInfo[0]->IsPresent == 'Collapsed' ? 'selected' : '' ;?>>Collapsed</option>
                        </select>
                    </div>
                </div>
                <div class="card-footer" style="padding-left: 80%;">    
                  <button id="payment-button" type="submit" class="btn btn-sm btn-info" type="submit" <?php echo isset($_GET['id'])!=''? 'name="value" value="'.$_GET['id'].'"' : '';?>><?php echo isset($_GET['id'])!=''? 'Update' : 'Add';?></button>
                    <button id="payment-button" type="submit" <?php echo isset($_GET['id'])!=''? '' : 'hidden';?> class="btn btn-sm btn-danger" type="submit" <?php echo isset($_GET['id'])!=''? 'name="value" value="'.$_GET['id'].',Delete'.'"' : '';?>>Delete</button>
                    <button type="reset" class="btn btn-sm btn-danger"> Cancel
                    </button>
                </div>  
            </form>
        </div>
    </div>
</div>
<!--      <?php echo isset($get_parent_cat) && $get_parent_cat[0]->category_name == $maincatdata->category_name ? 'selected'  : ''?>
-->
</div>

    <?php 
    require CMS_JS;




