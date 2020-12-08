 <?php 
function debug($data, $is_exist = false){
	echo "<pre>";
	print_r($data);
	echo "</pre>";
	if($is_exist){
		exit;
	}
}
function redirect($path, $session_key=null, $session_msg=null){
    if($session_key != null){
        setFlash($session_key, $session_msg);
    }
    header('location: '.$path);
    exit;
}

function setFlash($key, $message){
    if(!isset($_SESSION)){
        session-start();
    }
    $_SESSION[$key] = $message;
}
function flash(){
    if(isset($_SESSION['success']) && !empty($_SESSION['success'])){
        echo "<p class='alert alert-success'>".$_SESSION['success']."</p>";
        unset($_SESSION['success']);
    }

    if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
        echo "<p class='alert alert-danger'>".$_SESSION['error']."</p>";
        unset($_SESSION['error']);
    }

    if(isset($_SESSION['warning']) && !empty($_SESSION['warning'])){
        echo "<p class='alert alert-warning'>".$_SESSION['warning']."</p>";
        unset($_SESSION['warning']);
    }
      if(isset($_SESSION['info']) && !empty($_SESSION['info'])){
        echo "<p class='alert alert-info'>".$_SESSION['info']."</p>";
        unset($_SESSION['info']);
    }
}
function loggedin_check(){
     $user = new User();
    if(!isset($_SESSION, $_SESSION['token']) || empty($_SESSION) || empty($_SESSION['token'])){

        if(isset($_COOKIE, $_COOKIE['_au']) && !empty($_COOKIE['_au'])){
            $token  = $_COOKIE['_au'];
            $user_info = $user->getUserByToken($token);
            if(!$user_info){
                setcookie('_au','',time()-60,'/');
                redirect('./','error', 'Please login first');
            }
            $_SESSION['user_id'] = $user_info[0]->id;
            $token = getRandomString(100);
            $_SESSION['token'] = $token;
            setcookie('_au',$token, time()+8640000, '/');
            $data['remember_token'] = $token;
            $user->updateUser($data, $user_info[0]->id);
                        
        } else {
            redirect('./','error','Please login first');
        }
    }
}
function getRandomString($len =100){
    $chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $str_leng = strlen($chars); // length of $chars
    $random = '';

    for($i=0; $i <$len; $i++){
        $posn = rand(0, $str_leng-1);
        $random .= $chars[$posn];
    }
    return $random;
}
function uploadSingleImage($file, $dir){
    if($file['error'] == 0){
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        if(in_array($ext, IMAGE_EXTENSIONS)){
            if($file['size'] <= 5000000){
                $file_name ="PROFILE-".date('Ymdhis').rand(0,999).".".$ext;
                $succss = move_uploaded_file($file['tmp_name'],$dir.'/'.$file_name);
                if($succss){
                    return $file_name;
                } else {
                    return false;
                }
            } else {
                return null;
            }
        } else {
            return null;
        }
    } else {
        return null;
    }
}


function sanitize($str){
    // mysqli_real_escape_string($str); 
    $str = strip_tags($str);
    $str = rtrim($str);
    return $str;
}

function validate_phone_number($mobile)
{
    return preg_match('/^[0-9]{10}+$/', $mobile);
}
function validate_email($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

