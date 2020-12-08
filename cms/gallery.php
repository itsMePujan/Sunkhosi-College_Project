<?php 
require $_SERVER['DOCUMENT_ROOT'].'/config/init.php';
loggedin_check();    
require CMS_CSS;
require SIDE_TOP;
require HEADER;
$gallery = new Gallery();
if(@$_GET['id']){
	@$allInfo = $gallery->getallinformation($_GET['id']);
}
flash();
?>
<!-- main contain -->

<div class="card">
	<div class="card-header"><strong>Sunkoshi</strong> Gallery </div>
	<div class="card-body card-block">
		<form action="<?php echo FONTEND_PATH.'/process/gallery.php' ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
			<input type="hidden" name="Action" value="<?php echo @isset($_GET['id'])?'UPDATE' : 'INSERT'; ?>">
			<div class="row form-group">
				<div class="col col-md-3">
					<label for="password-input" class=" form-control-label">Title</label>
				</div>
				<div class="col-12 col-md-9">
					<input type="text"  required name="title" placeholder="Title"  value="<?php echo @$allInfo[0]->title; ?>" class="form-control"></div>
				</div>
				<div class="row form-group">
					<div class="col col-md-3">
						<label for="textarea-input" class=" form-control-label">Description</label></div>
						<div class="col-12 col-md-9">
							<textarea name="description" rows="10"  class="form-control" ><?php echo @$allInfo[0]->description; ?></textarea>
							<!-- <input type="textarea" name="description" rows ="10" value="<?php echo @$allInfo[0]->id ;?> " class="form-control"> -->
						</div>
					</div>
					<div class="row form-group">
						<div class="col col-md-3">
							<label for="file-input" class=" form-control-label">Image</label>
						</div>
						<div class="col-12 col-md-9">
							<input type="file" name="image"   class="form-control-file"  value="<?php echo @$allInfo[0]->image;?>">
							<?php  if(@$allInfo){
								?>
								<img src="<?php echo SITE_URL.'/uploads/gallery/'.@$allInfo[0]->image; ?>" style="max-width: 30%; max-height: 30%;" >
								<input type="hidden" name="old_image" value="<?php echo @$allInfo[0]->image;?> ">
								<?php
							} ?>
							
						</div>    
					</div>
				<div class="row form-group">
					<div class="col col-md-3">
						<label for="textarea-input" class=" form-control-label">Is Banner ?</label></div>
						<div class="col-12 col-md-9">
							  <select name="banner" required id="status" class="form-control">
							      <option value="Yes"<?php echo isset($allInfo, $allInfo[0]->banner) && $allInfo[0]->banner == 'Yes' ? 'selected' : '' ;?>>Yes</option>
								 <option value="No"<?php echo isset($allInfo, $allInfo[0]->banner) && $allInfo[0]->banner == 'No' ? 'selected' : '' ;?>>No</option>
							  </select> 
						</div>
					</div>

					<div class="card-footer" style="padding-left: 70%;">
						<button id="payment-button" type="submit" class="btn btn-sm btn-info" type="submit" <?php echo isset($_GET['id'])!=''? 'name="value" value="'.$_GET['id'].'"' : '';?>><?php echo isset($_GET['id'])!=''? 'Update' : 'Add';?></button>
						
						<button id="payment-button" type="submit" <?php echo isset($_GET['id'])!=''? '' : 'hidden';?> class="btn btn-sm btn-danger" type="submit" <?php echo isset($_GET['id'])!=''? 'name="value" value="'.$_GET['id'].',Delete'.'"' : '';?>>Delete</button>
						<button type="reset" class="btn btn-danger btn-sm">
							<i class="fa fa-ban"></i> Reset

						</div>
					</form>
				</div>	
			</div>
			<?php require CMS_JS; ?>

