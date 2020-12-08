  <?php
    require $_SERVER['DOCUMENT_ROOT'].'/config/init.php';
    $userinfo = new User;
 if (isset($_POST,$_POST['full_name'],$_POST['email'],$_POST['password'],$_POST['phone'],$_POST['address']) && 
    	(!empty($_POST['email'])) && !empty($_POST['full_name']) && !empty($_POST['password']) && !empty($_POST['address']) && !empty($_POST['phone'])) {
 			$in_phone = $userinfo->getUserByPhone(validate_phone_number($_POST['phone']));
 			//	debug((int)$_POST['phone'],true);
 			$in_email = $userinfo->getUserByUserName(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)); 
 			//	debug(validate_email($_POST['email']),true);
 			if(!$in_email){
 				if (!$in_phone){	
 						$dir=PROJECT_PATH.'/uploads/users/'.$_POST['email'];
 						if(is_dir($dir)==false){
   							  mkdir($dir);
                  debug($_POST);     
                  if (isset($_FILES,$_FILES['image']) && !empty($_FILES['image'])) {
                        $fullname = $_POST['full_name'];
                        $email =$_POST['email'];
                        $password=sha1($email.$_POST['password']);
                        $phonenumber = (int)$_POST['phone'];
                        $address = $_POST['address'];
                        $filename= uploadSingleImage($_FILES['image'],$dir);
                              $data=array('name' => $fullname,
                                 'email' =>$email,
                                 'phone_number' =>$phonenumber,
                                 'password'=>$password,
                                 'address' =>$address,
                                 'image' =>$filename                                 
                                         );
                            $final=@$userinfo->addUser($data);
                            if($final){
                                redirect('../index.php','success','User Created Successfully! ');
                            }else{
                                redirect('../register.php','error','Error While Creating User <strong>Retry</strong>');
                            }
                  }else{
                    $data=array('name' => $fullname,
                                 'email' =>$email,
                                 'phone_number' =>$phonenumber,
                                 'password'=>$password,
                                 'address' =>$address,                               
                                         );
                            $final=@$userinfo->addUser($data);
                            if($final){
                                redirect('../index.php','success','User Created Successfully! ');
                            }else{
                                redirect('../register.php','error','Error While Creating User <strong>Retry</strong>');
                            }
                  }
							}else{
                redirect('../register.php','Error','Error while creating<strong>'.' '.$in_email[0]->email.'</strong> Contact Administrator!');  }
 				}else{
  				redirect('../register.php','info','Phone<strong>'.' '.$in_phone[0]->phone_number.'</strong> already in used Or Number is invalid');
 				   }
 			}else{
  				redirect('../register.php','info','EMAIL<strong>'.' '.$in_email[0]->email.'</strong> already Inused');	
  				}
 }else{
  		redirect('../register.php','error','These information is complusary');
}
