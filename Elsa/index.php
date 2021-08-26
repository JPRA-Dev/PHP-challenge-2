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

<p>Hello <a href="profile.php?user=<?php echo escape($user->data()->username); ?>"><?php echo escape($user->data()->username); ?></a>!</p>

<ul>
    <li><a href="logout.php">Log out</a></li>
    <li><a href="update.php">Update details</a></li>
    <li><a href="changepwd.php">Change password</a></li>
</ul>
<?php
        if($user->hasPermission('admin')){// change to not permission go to Error
            echo '<p>You are an admin.</p>';
        }
    }else{
        echo '<p>You need to <a href="login.php">Log in </a> or <a href="signup.php">Register</a>';
    }
?>
</body>
</html>