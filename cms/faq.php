<?php 
require $_SERVER['DOCUMENT_ROOT'].'/config/init.php';
loggedin_check();
require CMS_CSS;
require SIDE_TOP;
require HEADER;
echo TITLE;
$faq = new Faq();
$getfaq = $faq->getAllfaq(); 
if(@$_POST){
		if(@$_POST['Update']){
		  $updatecheckid = $faq->getfaqById($_POST['Update']);
		  if($updatecheckid){
		 $data = array(
		'question' => sanitize(@$_POST['question']),
		'answer' => sanitize(@$_POST['answer'])
			);
		$success = $faq->updatefaq($data,$_POST['Update']);
		if($success){
			redirect(CMS_URL.'/faq.php','success','FAQ UPdated Successfully');
		}else{
			redirect(CMS_URL.'/faq.php','success','Problem while Updating FAQ');			
		}

		  }
		}
	$data = array(
		'question' => sanitize(@$_POST['question']),
		'answer' => sanitize(@$_POST['answer'])
	);
	if(($data['question']&&$data['answer']) != null){
		$success = $faq->addfaq($data);
		if($success){
			redirect(CMS_URL.'/faq.php','success','FAQ added Successfully');
		}else{
			redirect(CMS_URL.'/faq.php','success','Problem while adding FAQ');			
		}
	}
}if(@$_POST['Update']){
  $updatecheckid = $faq->getfaqById($_POST['Update']);

}
if (@$_POST['Action']) {
  $getfaqbyid = $faq->getfaqById($_POST['Action']);
  if(@$getfaqbyid){
  	$question = @$getfaqbyid[0]->question;
  	$answer = @$getfaqbyid[0]->answer;
  	$id= @$getfaqbyid[0]->id;
  }
  	}
  	if (@$_POST['Delete']) {
  $Delete = $faq->getfaqById($_POST['Delete']);
  if(@$Delete){
  	$success = $faq->deletefaq($_POST['Delete']);
		if($success){
			redirect(CMS_URL.'/faq.php','success','FAQ Deleted Successfully');
		}else{
			redirect(CMS_URL.'/faq.php','success','Problem while Deleting FAQ');			
		}

  }
  	}

?>
	<?php flash();?>

	<!-- main contain -->
	<div class="overview">
		&nbsp; &nbsp;
		<button  class="au-btn au-btn-icon au-btn--blue" type="submit" style=" padding-left: 49%; padding-right: 49% "> add    </button>
	</div>
	<br>

	<div class="card seen">
		<div class="card-header">
			<strong>FAQ</strong>
		</div>
		<div class="card-body card-block">
			<form action="" method="POST" class="form-horizontal">
				<div class="row form-group">
					<div class="col col-md-3">
						<label for="hf-email" class=" form-control-label">Questions</label>
					</div>
					<div class="col-12 col-md-9">
						<input type="text" name="question" value="<?php echo @$question; ?>" placeholder="Enter Question..." required class="form-control">
					</div>
				</div>
				<div class="row form-group">
					<div class="col col-md-3">
						<label  class="form-control-label">Password</label>
					</div>
					<div class="col-12 col-md-9">
						<input type="text"  name="answer" value="<?php echo @$answer; ?>" placeholder="Enter Answer..." required class="form-control">
					</div>
				</div>
				<button type="submit" name="Update"  value="<?php echo @$id;  ?>" class="btn btn-primary btn-sm">
					<i class="fa fa-dot-circle-o"></i> <?php echo (@$_POST['Action'] ? 'Update' : 'Add') ?>
				</button>
				<button type="reset" class="btn btn-danger btn-sm">
					<i class="fa fa-ban"></i> Reset
				</button>

			</form>
		</div>

	</div>

	<div class="overview">
		&nbsp; &nbsp;
		<button  class="au-btn au-btn-icon au-btn--blue" type="submit" style=" padding-left: 47.5%; padding-right: 47.5%"> FAQ LIST </button>
	</div>
	<br>

	<!--  -->
<?php 
	if($getfaq){
		foreach($getfaq as $key => $data) {
			?>
	<div class="col-md-12">
		<div class="card border border">
			<div class="card-header">
				<strong class="card-title"><?php echo $key+1 .">" ?>. <?php echo $data->question; ?></strong>
				<form method="POST" action="">
				<button class="btn btn-sm btn-primary" name="Action" value="<?php echo $data->id; ?>" onclick="show()" >Update</button>
				<button class="btn btn-sm btn-danger" name="Delete" value="<?php echo $data->id; ?>" onclick="show()" >Delete</button>
			</form>	
			</div>
			<div class="card-body">
				<p class="card-text">ANS . > <?php echo $data->question; ?></p>
			</div>
		</div>
	</div>
	<?php
		}
	}
 ?>




	<?php 
	require CMS_JS;
	?>

	<script >       
		// window.onload=function(){
			// $('.seen').hide();
		// }
		function show(){
			$('.seen').slideDown();
		}		
		var count = 1;
		function hide(){
			count +=1;
			console.log(count);
			if ( count % 2 == 0) {
				console.log('Even Number');
				$('.seen').slideDown(); 
			}else{
				$('.seen').slideUp(); 
			}
		}
	</script>