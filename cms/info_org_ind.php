<?php 
    require $_SERVER['DOCUMENT_ROOT'].'/config/init.php';
    loggedin_check();    
    require CMS_CSS;
    require SIDE_TOP;
    require HEADER;
    $personalInfo = new Information();
    $indus_org = $personalInfo->getInfo();
    if($indus_org){
        //debug($indus_org);  
    }
    flash();
?>
<!-- main contain -->
<div class="overview">
    &nbsp; &nbsp;
    <button  class="au-btn au-btn-icon au-btn--blue" > <a href="<?php echo CMS_URL.'/info_org_ind_add.php' ?>" style="color: white;">+ Add Info</a>
        </button>
    </div>
<br>
<!--table starts -->
<div class="col-lg-12">
    <div class="header">
        <h3>&nbsp;&nbsp;&nbsp; Indrustries and organizations Information</h3>
    </div>
    <br>
    <?php
    //$indus_org = $perDeleteDataByIdsonnel->getAllPerson();
    ?>
    <div class="table-responsive table--no-card m-b-40">
        <table class="table table-borderless table-striped table-earning">
            <thead>
                <tr>
                    <th class="text-center">Property Name</th>
                    <th class="text-center">Property Type</th>
                    <th class="text-center">RegestrationNo</th>
                    <th class="text-center">Location</th>
                    <th class="text-center">Contact No.</th>
                    <th class="text-center">EstablishedDate</th>
                    <th class="text-center">Status / Present ?</th>
                    <th class="text-center">Total Employess</th>
                    <th class="text-center"> Action </th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (@$indus_org) {
                    foreach (@$indus_org as $key => $details) {
                        ?>
                        <tr>
                            <td class="text-center"><?php echo @$details->Name; ?></td>
                            <td class="text-center"><?php echo @$details->Type; ?></td>                            
                            <td class="text-center"><?php echo @$details->RegestrationNo; ?></td>
                            <td class="text-center"><?php echo @$details->Location; ?></td>
                            <td class="text-center"><?php echo @$details->Contact; ?></td>
                            <td class="text-center"><?php echo @$details->EstablishedDate ; ?></td>
                            <td class="text-center"><?php echo @$details->IsBanned .'/  '. @$details->IsPresent; ?></td>
                            <td class="text-center"><?php echo @$details->EmployeeCount; ?></td>
                            <td class="text-center">
                            <a class="btn btn-sm btn-success" href="<?php echo CMS_URL.'/info_org_ind_add.php?id='.@$details->Id; ?>">Edit</a>
                                <form method="post" action="<?php echo CMS_URL.'/process/info_org_ind.php' ?>" >
                            <button id="payment-button" type="submit"  class="btn btn-sm btn-danger" type="submit" name="value" value="<?php echo @$details->Id.',Delete'; ?>" >Delete</button>
                            <input type="hidden" name="Action" value="Update">
                                </form>
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

<?php require CMS_JS; ?>