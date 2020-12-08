<?php 
    require $_SERVER['DOCUMENT_ROOT'].'/config/init.php';
    loggedin_check();

    require CMS_CSS;
 	require SIDE_TOP;
 	require HEADER;
 	echo TITLE;
    $About = new About();
    $UpdateWeb = $About->getbyid(1);
 	?>
 	<?php flash();?>
    <!-- main contain -->
    <div class="col-md-12">
</div>
<br>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3>About</h3>
        </div>
        <div class="card-body card-block">
            <form action="<?php echo CMS_URL . '/process/about.php' ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                <input type="hidden" name="Action" value="Update">
                <div class="form-group row">
                    <label for="" class="col-sm-3">Title: </label>
                    <div class="col-sm-9">
                        <input type="text" name="title" value="<?php echo @$UpdateWeb[0]->Title; ?>" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-3">Summery: </label>
                    <div class="col-sm-9">
                        <textarea name="Summery" id="Summery" rows="5" style="resize: none;" class="form-control"><?php echo @$UpdateWeb[0]->Summery; ?></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-3">Description: </label>
                    <div class="col-sm-9">
                        <textarea name="description" id="description" rows="10" style="resize: none;" class="form-control"><?php echo @$UpdateWeb[0]->Description; ?></textarea>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="image" class=" form-control-label">Update Image:</label>
                    </div>
                    <div class="col col-md-4">
                        <input type="file" id="image" name="image" class="form-control-file" accept="image/*">
                    </div>
                </div>
                <input type="hidden" name="old_image" value="<?php echo @$UpdateWeb[0]->image?>">
                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-sm">
                        <i class="fa fa-pen"></i>Upadate
                    </button>
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-trash"></i> Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
 	<?php 
    require CMS_JS;