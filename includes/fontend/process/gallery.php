	<?php 
	require $_SERVER['DOCUMENT_ROOT'].'/config/init.php';
	$gallery = new Gallery();	
	// debug($_FILES);
	// debug($_POST);
	if($_POST['Action']){
		if($_POST['Action']=='INSERT'){
			if(isset($_POST,$_POST['title'],$_FILES['image'])){
				debug($_POST);
				debug($_FILES);
				$dir=PROJECT_PATH.'/uploads/gallery/';
				debug($dir);
				$filename=uploadSingleImage($_FILES['image'],$dir);
				if($filename){
					$data = array(
						'title' => sanitize($_POST['title']),
						'description' => @sanitize($_POST['description']),
						'image' => $filename,
						'banner'=> @sanitize($_POST['banner']),
						'uploaded_by' => $_SESSION['user_id']
					);
					$success=$gallery->AddImage($data);
					if($success){
						redirect(SITE_URL.'/cms/gallery.php','success','Image Uploaded Successfully');
					}else{
						redirect(SITE_URL.'/cms/gallery.php','error','Problem While Uploading Image');

					}
				}else{
					redirect(SITE_URL.'/cms/gallery.php','success','There is Error in File!');
				}
			}else{
				redirect(SITE_URL.'/cms/gallery.php','error','Image data required !	');
			}
		}else if($_POST['Action']=='UPDATE'){
			$Action=$_POST['value'];
			$str_arr = explode(",", $Action);
			$id= $str_arr[0];
			$get_image = $gallery->getallinformation($id);
			$del_img = $get_image[0]->image;
			if($Action == $id.',Delete'){
					debug($idValid);
				$success=$gallery->DeleteImageById($id);
				if($success){
					unlink(PROJECT_PATH.'/uploads/gallery/'.$del_img);
					redirect(SITE_URL.'/cms/gallery_list.php','success','information Deleted Successfully');
				}else{
					redirect(SITE_URL.'/cms/gallery_list.php','success','Problem while Deleting  Information');
				}
			}            
			$idValid = $gallery->validid($_POST['value']);
			if($idValid){
				$dir=PROJECT_PATH.'/uploads/gallery/';
				debug($dir);
				$old_image= $_POST['old_image'];
				$filename=uploadSingleImage($_FILES['image'],$dir);
				$file = (($filename) ? $filename : $old_image);
					$data = array(
						'title' => sanitize($_POST['title']),
						'description' => @sanitize($_POST['description']),
						'image' => $file,
						'banner'=> @sanitize($_POST['banner']),
						'uploaded_by' => $_SESSION['user_id']
					);
			$success=$gallery->UpdateImage($data,$_POST['value']);
			if($success){
				//unlink(PROJECT_PATH.'/uploads/gallery/'.$del_img);
				redirect(SITE_URL.'/cms/gallery.php?id='.$id,'success','information Updated Successfully');
			}else{
				redirect(SITE_URL.'/cms/gallery.php?id='.$id,'success','Problem while Updating  Information');
			}
		}else{
				redirect(SITE_URL.'/cms/gallery_list.php','error','Refresh and try again !');
		}
		
		}else{
			debug($_POST);

			redirect(SITE_URL.'/cms/gallery.php','error','Information Not Found or  Deleted ! try to refresh');	
		}

}else{

	redirect(SITE_URL.'/cms/gallery.php','','');
}