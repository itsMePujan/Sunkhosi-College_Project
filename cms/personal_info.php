<?php 
    require $_SERVER['DOCUMENT_ROOT'].'/config/init.php';
    loggedin_check();    
    require CMS_CSS;
    require SIDE_TOP;
    require HEADER;
    $personalInfo = new PersonalInfo();
    $perosnal = $personalInfo->getAllperosnalinfo();
    if($perosnal){
    }
    flash();
?>
<!-- main contain -->
<div class="overview">
    &nbsp; &nbsp;
    <button  class="au-btn au-btn-icon au-btn--blue" > <a href="<?php echo CMS_URL.'/personal_info_add.php' ?>" style="color: white;">+ Add perosnal</a>
        </button>
    </div>
<br>
<!--table starts -->
<div class="col-lg-12">
    <div class="header">
        <h3>&nbsp;&nbsp;&nbsp; perosnal List</h3>
    </div>
    <br>
    <?php
    //$perosnal = $perDeleteDataByIdsonnel->getAllPerson();
    ?>
    <div class="table-responsive table--no-card m-b-40">
        <table class="table table-borderless table-striped table-earning">
            <thead>
                <tr>
                    <th class="text-center">Full Name</th>
                    <th class="text-center">CitizenShip Info</th>
                    <th class="text-center">Address</th>
                    <th class="text-center">Contact No.</th>
                    <th class="text-center">LiteracyStatus</th>
                    <th class="text-center">Gender</th>
                    <th class="text-center">live or Dead</th>
                    <th class="text-center"> Action </th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (@$perosnal) {
                    foreach (@$perosnal as $key => $details) {
                        ?>
                        <tr>
                            <td class="text-center"><?php echo @$details->Name; ?></td>
                            <td class="text-center"><?php echo @$details->CitizenshipNo; ?></td>
                            <td class="text-center"><?php echo @$details->Address; ?></td>
                            <td class="text-center"><?php echo @$details->Contact; ?></td>
                            <td class="text-center"><?php echo @$details->Address; ?></td>
                            <td class="text-center"><?php echo @$details->Address; ?></td>
                            <td class="text-center"><?php echo @$details->IsAlive; ?></td>
                            <td class="text-center">
                            <a class="btn btn-sm btn-success" href="<?php echo CMS_URL.'/personal_info_add.php?id='.@$details->Id; ?>">Edit</a>
                                <form method="post" action="<?php echo CMS_URL.'/process/personal_info_add.php' ?>" >
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