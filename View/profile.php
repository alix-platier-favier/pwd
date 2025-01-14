<?php

use App\Model\User;
use App\Controller\AuthentificationController;


require_once __DIR__ . '/../vendor/autoload.php';

if (!isset ($_SESSION)){
    session_start();
}

var_dump ($_SESSION);

$auth = new AuthentificationController();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];

    $_SESSION['email'] = $email;
    $_SESSION['fullname'] = $fullname;

    $auth->updateProfile($email, $password, $fullname);

}
?>


<div class="title-text">
    Update my info
</div>
<div class="form-inner">
<form action="" method="post" class="signup">
    <div class="field">
        <input type="text" placeholder="Fullname" name="fullname" value="<?php echo $_SESSION ['user']->getFullname(); ?>">
    </div>  
    <div class="field">
        <input type="text" placeholder="Email" name="email" value="<?php echo $_SESSION ['user']->getEmail(); ?>">
    </div>
    <div class="field">
        <input type="password" placeholder="New Password" name="password">
    </div>
    <div class="field btn">
        <input type="submit" value="Save">
    </div>
</form>