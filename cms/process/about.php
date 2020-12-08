<?php
require $_SERVER['DOCUMENT_ROOT'].'/config/init.php';
debug($_FILES['image']);
debug($_POST);
$web = new About();

if (isset($_POST) && !empty($_POST)) {
    if ($_POST['Action'] == 'Update') {   
        $data = array(
            'Title' => sanitize($_POST['title']),
            'Description' => htmlentities($_POST['description']),
            'Summery' => sanitize($_POST['Summery']),
        );
        if (isset($_FILES, $_FILES['image']['error']) && $_FILES['image']['error'] == 0) {
            if (isset($_POST['old_image']) && !empty($_POST['old_image'])) {
                if(file_exists(PROJECT_PATH . '/uploads/gallery/' . $_POST['old_image'])) {
                    unlink(PROJECT_PATH . '/uploads/gallery/' . $_POST['old_image']);
                }
            }
            $dir = PROJECT_PATH.'/uploads/gallery';
            $filename = uploadSingleImage($_FILES['image'],$dir);
            $data['Image'] = $filename;
        }
        debug($data);
        $Id = 1;    
        $successUpdate = $web->updatebyid($data,$Id);
        // debug($successUpdate,true);
        if($successUpdate) {
            redirect(CMS_URL .'/about.php', 'success', 'About Page Updated successfully.');
        } else {
            redirect(CMS_URL .'/about.php', 'error', 'Sorry! There was problem while updating Page.');
    }
    }else {
        redirect(CMS_URL .'/about.php', 'error', 'Please insert the data and submit form.');
    }
}else {
    redirect(CMS_URL .'/about.php', 'error', 'Unauthorized access');
}
