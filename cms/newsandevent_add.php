<title>Sunkoshi Rural Municipality</title>
<?php 
    require $_SERVER['DOCUMENT_ROOT'].'/config/init.php';
    loggedin_check();
    require CMS_CSS;
    require SIDE_TOP;
    require HEADER;
    $News = new NewsEvent();
    if(@$_GET['id']){
            @$allInfo = $News->getallinformation($_GET['id']);
        }
     flash();
    ?>

    <div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3>&nbsp <?php echo isset($_GET['id'])!=''? 'Update' : 'Add';?> Information</h3>
        </div>
        <div class="card-body card-block">
            <form action="<?php echo CMS_URL .'/process/newsandevent.php' ?>" method="post"  class="form-horizontal">
                <input type="hidden" name="Action" value="<?php echo isset($_GET['id'])!=''? 'Update' : 'Insert';?>">
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label  class=" form-control-label">Title :</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" id="Name" name="title" value="<?php echo @$allInfo[0]->title; ?>" class="form-control" required="" >
                    </div>
                    <div class="col col-md-3">
                        <label  class=" form-control-label">Description :</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text"  name="description" value="<?php echo @$allInfo[0]->description; ?>" class="form-control" required="" >
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label  class=" form-control-label">News Or Events</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <select name="NorE" id="Gender" class="form-control" required="">
                            <option value="News" <?php echo @$allInfo[0]->NoeE == 'News' ? 'selected' : '' ;?>>News</option>
                            <option value="Events"<?php echo @$allInfo[0]->NoeE == 'Events' ? 'selected' : '' ;?>>Events</option>
                        </select>
                    </div>
                    <div class="col col-md-3">
                        <label  class=" form-control-label">Religion :</label>
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