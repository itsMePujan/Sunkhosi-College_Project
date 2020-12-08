<?php 
    require $_SERVER['DOCUMENT_ROOT'].'/config/init.php';
    loggedin_check();    
    require CMS_CSS;
 	require SIDE_TOP;
 	require HEADER;
 	$gallery = new Gallery();
 	$image = $gallery->getAllimage();
 	if($image){
 		//echo "hello";
 		//debug($image);
 	}
 	flash();
?>
<!-- main contain -->
<div class="overview">
    &nbsp; &nbsp;
    <button  class="au-btn au-btn-icon au-btn--blue" > <a href="<?php echo CMS_URL.'/gallery.php' ?>" style="color: white;">+ Add Image</a>
        </button>
	</div>
<br>
<!--table starts -->
<div class="col-lg-12">
    <div class="header">
        <h3>&nbsp;&nbsp;&nbsp; Image List</h3>
    </div>
    <br>
    <?php
    //$image = $perDeleteDataByIdsonnel->getAllPerson();
    ?>
    <div class="table-responsive table--no-card m-b-40">
        <table class="table table-borderless table-striped table-earning">
            <thead>
                <tr>
                    <th class="text-center">S.N</th>
                    <th class="text-center">Title</th>
                    <th class="text-center">Description</th>
                    <th class="text-center">Is Banner ?</th>
                    <th class="text-center">Added Date</th>
                    <th class="text-center">Updated Date</th>
                    <th class="text-center"> Action </th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (@$image) {
                    foreach (@$image as $key => $details) {
                        ?>
                        <tr>
                            <td class="text-center"><?php echo @$key + 1; ?></td>
                            <td class="text-center"><?php echo @$details->title; ?></td>
                            <td class="text-center"><?php echo @$details->description; ?></td>
                            <td class="text-center"><?php echo @$details->banner; ?></td>
                            <td class="text-center"><?php echo @$details->added_date; ?></td>
                            <td class="text-center"><?php echo @$details->updated_date; ?></td>
                            <td class="text-center">
                            <a class="btn btn-sm btn-success" href="<?php echo CMS_URL.'/gallery.php?id='.@$details->id; ?>">Edit</a>
                            	<form method="post" action="<?php echo FONTEND_PATH.'/process/gallery.php' ?>" >
                            <button id="payment-button" type="submit"  class="btn btn-sm btn-danger" type="submit" name="value" value="<?php echo @$details->id.',Delete'; ?>" >Delete</button>
                            <input type="hidden" name="Action" value="UPDATE">
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