<?php 
    require $_SERVER['DOCUMENT_ROOT'].'/config/init.php';
    $Contact = new Contact();
   	$data = array(
   		'name' =>sanitize($_POST['name']),
   		'email' => sanitize($_POST['email']),
   		'subject' => sanitize($_POST['subject']),
   		'message' => sanitize($_POST['message'])
   		 );
   		$success= $Contact->addContact($data);
   		if($success){
   				 echo "<p class='alert alert-success'> ".'Message Sent Succesfully'."</p>";
   		}else{
   				 echo "<p class='errormessage alert alert-success' ".'Error While Sending  	'."</p>";
   		}
?>
                                    <script >
                                        setTimeout(function(){
                                            $('.alert').slideUp();
                                        },3000);
                                </script>