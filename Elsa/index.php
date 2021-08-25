<?php
    
    require_once 'includes/init.inc.php';
    if(Session::exists('home')){
        echo '<p>' . Session::flash('home') . '</p>';
    }

    $user =new User();
    if($user->isloggedIn()){

    ?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<p>Hello <a href="#"><?php echo escape($user->data()->username); ?></a>!</p>

<ul>
    <li><a href="logout.php">Log out</a></li>
    <li><a href="update.php">Update details</a></li>
</ul>
<?php
    }else{
        echo '<p>You need to <a href="login.php">Log in </a> or <a href="signup.php">Register</a>';
    }
?>
</body>
</html>