<title>Sunkoshi Rural Municipality</title>
<?php 
    require $_SERVER['DOCUMENT_ROOT'].'/config/init.php';
    loggedin_check();
    require CMS_CSS;
 	require SIDE_TOP;
 	require HEADER;
    $personal_info = new PersonalInfo();
    if(@$_GET['id']){
            @$allInfo = $personal_info->getallinformation($_GET['id']);
            }
     flash();
    ?>

 	<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3>&nbsp <?php echo isset($_GET['id'])!=''? 'Update' : 'Add';?> citizens information</h3>
        </div>
        <div class="card-body card-block">
            <form action="<?php echo CMS_URL .'/process/personal_info_add.php' ?>" method="post"  class="form-horizontal">
                <input type="hidden" name="Action" value="<?php echo isset($_GET['id'])!=''? 'Update' : 'Insert';?>">
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label  class=" form-control-label">Fullname :</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" id="Name" name="Name" value="<?php echo @$allInfo[0]->Name; ?>" class="form-control" required="" >
                    </div>
                    <div class="col col-md-3">
                        <label  class=" form-control-label">Citizenship No :</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" id="CitizenshipNo" name="CitizenshipNo" value="<?php echo @$allInfo[0]->CitizenshipNo; ?>" class="form-control" required="" >
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label  class=" form-control-label"> Address :</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" id="Address" name="Address" value="<?php echo @$allInfo[0]->Address; ?>" class="form-control" required="" >
                    </div>
                    <div class="col col-md-3">
                        <label  class=" form-control-label">Profession :</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" id="Profession" name="Profession" value="<?php echo @$allInfo[0]->Profession; ?>" class="form-control" >
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label  class=" form-control-label">Fathers Name :</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" id="FathersName" name="FathersName" value="<?php echo @$allInfo[0]->FathersName; ?>" class="form-control" required="" >
                    </div>
                    <div class="col col-md-3">
                        <label class=" form-control-label">Mothers Name :</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" id="MothersName" name="MothersName" value="<?php echo @$allInfo[0]->MothersName; ?>" class="form-control" required="" >
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label  class=" form-control-label">Contact :</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="number" id="Contact" name="Contact"  value="<?php echo @$allInfo[0]->Contact; ?>" class="form-control" required="">
                    </div>
                    <div class="col col-md-3">
                        <label  class=" form-control-label">Date of Birth :</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="date" id="DateOfBirth" name="DateOfBirth" class="form-control" value="<?php echo @$allInfo[0]->DateOfBirth; ?>" required="">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label  class=" form-control-label">Gender :</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <select name="Gender" id="Gender" class="form-control" required="">
                            <option value="Male" <?php echo @$allInfo[0]->Gender == 'Male' ? 'selected' : '' ;?>>Male</option>
                            <option value="Female"<?php echo @$allInfo[0]->Gender == 'Female' ? 'selected' : '' ;?>>Female</option>
                            <option value="Others" <?php echo @$allInfo[0]->Gender == 'Others' ? 'selected' : '' ;?>>Others</option>
                        </select>
                    </div>
                    <div class="col col-md-3">
                        <label  class=" form-control-label">Religion :</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <select name="Religion" id="Religion" class="form-control" required="">
                            <option value="Hinduism"<?php echo @$allInfo[0]->Religion == 'Hinduism' ? 'selected' : '' ;?>>Hinduism</option>
                            <option value="Buddhism"<?php echo @$allInfo[0]->Religion == 'Buddhism' ? 'selected' : '' ;?>>Buddhism</option>
                            <option value="Christanity"<?php echo @$allInfo[0]->Religion == 'Christanity' ? 'selected' : '' ;?>>Christanity</option>
                            <option value="Islam"<?php echo @$allInfo[0]->Religion == 'Islam' ? 'selected' : '' ;?>>Islam</option>
                            <option value="Others"<?php echo @$allInfo[0]->Religion == 'Others' ? 'selected' : '' ;?>>Others</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label  class=" form-control-label">Literacy Status :</label>
                         </div>
                    <div class="col-12 col-md-3">
                        <select name="LiteracyStatus" id="LiteracyStatus" class="form-control" required="">
                            <option value="Educated"<?php echo @$allInfo[0]->LiteracyStatus == 'Educated' ? 'selected' : '' ;?>>Educated</option>
                            <option value="Semieducated" <?php echo @$allInfo[0]->LiteracyStatus == 'Semieducated' ? 'selected' : '' ;?> >Semieducated</option>
                            <option value="Uneducated" <?php echo @$allInfo[0]->LiteracyStatus == 'UnEducated' ? 'selected' : '' ;?>>Uneducated</option>
                        </select>
                    </div>
                     <div class="col col-md-3">
                        <label for="IsAlive" class=" form-control-label">Is Alive :</label>
                    </div>
                    <div class="col col-md-3">
                        <select name="IsAlive" id="IsAlive" class="form-control" required="">
                            <option value="Alive"<?php echo @$allInfo[0]->IsAlive == 'Alive' ? 'selected' : '' ;?>>Alive</option>
                            <option value="Dead"<?php echo @$allInfo[0]->IsAlive == 'Dead' ? 'selected' : '' ;?>>Dead</option>
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
</div>

 	<?php 
    require CMS_JS;