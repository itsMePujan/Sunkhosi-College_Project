<?php 
    require $_SERVER['DOCUMENT_ROOT'].'/config/init.php';
    loggedin_check();
    require CMS_CSS;
 	require SIDE_TOP;
 	require HEADER;
 	echo TITLE;
       $contact =  new Contact();       
 	   $getAll = $contact->unseen('N');
       $getNonSeen = $contact->unseen('Y');
 	   if(@$_POST['Action']){
         $data = array(
            'is_seen' => 'Y'
             );
 	   	debug(@$_POST['Action']);
 	   	$setseen=$contact->setseen($_POST['Action'],$data);
 	   	if($setseen){
 	   		//echo "hello";
 	   		redirect(CMS_URL.'/contact.php','success','Successfully add to MARK AS seen');
 	   	}else{
 	   		//echo "there";
 	   		redirect(CMS_URL.'/contact.php','success','Problem while Marking as Seen');
 	   	}
 	   }
        if(@$_GET['Action']){
            $data = array(
            'is_seen' => 'N'
             );
        debug(@$_GET['Action']);
        $setseen=$contact->setseen($_GET['Action'],$data);
        if($setseen){
            //echo "hello";
            redirect(CMS_URL.'/contact.php','success','Successfully add to UnRead');
        }else{
            //echo "there";
            redirect(CMS_URL.'/contact.php','success','Problem while Marking as Unread');
        }
       }
 	?>
 	<?php flash();?>

			<div class="col-md-12">
                                <h3 class="title-5 m-b-35">UnSeen Messages</h3>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                            	<th>Id</th>
                                                <th>name</th>
                                                <th>email</th>
                                                <th>Subject</th>
                                                <th>Message</th>
                                                <th>Date</th>
                                                <th>Marked as Seen</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        if($getAll){
                                        	foreach ($getAll as $key => $data) {
                                        		# code...
                                        		?>
                                        		  <tbody>
                                            	<td><?php echo @$key+1 ?></td>
                                                <td><?php echo @$data->name ?></td>
                                                <td>
                                                    <span class="block-email"><?php echo @$data->email ?></span>
                                                </td>
                                                <td class="desc"><?php echo @$data->subject ?></td>
                                                <td> <textarea cols="30" rows="4"> <?php echo @$data->message ?></textarea></td>
                                                <td>
                                                    <span class="status--process"><?php echo @$data->Date ?></span>
                                                </td>
                                                <td>
                                                	<form action="" method="POST">
                                                		<button type="submit" class="btn btn-info" name="Action" value="<?php echo $data->id; ?>">Mark As seen</button>
                                                	</form>
                                                </td>
                                            </tr>
                                        </tbody>

                                        		<?php
                                        	}
                                        } 
                                         ?>
                                      
                                    </table>
                                </div>
                                <br>
                                <br>
                                     <div class="overview">
                                        &nbsp; &nbsp;
                                            <button class="au-btn au-btn-icon au-btn--blue" onclick="hide()">Show Viewed Message</button>
                                        </div>
                                    <br>
                                <!-- END DATA TABLE -->
                                <br>
                                <br>
                                <div class="col-md-12 seen" id="seen">
                                <h3 class="title-5 m-b-35">Viewed Messaged</h3>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>name</th>
                                                <th>email</th>
                                                <th>Subject</th>
                                                <th>Message</th>
                                                <th>Date</th>
                                                <th>Marked as Seen</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        if($getNonSeen){
                                            foreach ($getNonSeen as $key => $data) {
                                                # code...
                                                ?>
                                                  <tbody>
                                                <td><?php echo @$key+1 ?></td>
                                                <td><?php echo @$data->name ?></td>
                                                <td>
                                                    <span class="block-email"><?php echo @$data->email ?></span>
                                                </td>
                                                <td class="desc"><?php echo @$data->subject ?></td>
                                                <td> <textarea cols="30" rows="4"> <?php echo @$data->message ?></textarea></td>
                                                <td>
                                                    <span class="status--process"><?php echo @$data->Date ?></span>
                                                </td>
                                                <td>
                                                    <form action="" method="GET">
                                                        <button type="submit" class="btn btn-info" name="Action" value="<?php echo $data->id; ?>">Mark As UnRead</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        </tbody>

                                                <?php
                                            }
                                        } 
                                         ?>
                                      
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>




 	<?php 
    require CMS_JS;
    ?>
<script >       
          window.onload=function(){
      $('.seen').hide();
         
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
