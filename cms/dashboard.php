<?php
    require $_SERVER['DOCUMENT_ROOT'].'/config/init.php';
    loggedin_check();

  require CMS_CSS;
 	require SIDE_TOP;
 	require HEADER;
 	echo TITLE;
 	?>
 
 	<?php flash();?>

    <!-- main contain -->
 	<?php
    require CMS_JS;
