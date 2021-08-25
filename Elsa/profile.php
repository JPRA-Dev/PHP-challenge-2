<?php
require_once 'includes/init.inc.php';

if(!$username = Input::get('user')){
    Redirect::to('index.php');
}else{
    $user= new User($username);
    if(!$user->exists()){
        Redirect::to('404');
    }else{
        $data=$user->data(); 
    }// with this we have access to user file information 
    ?>
    <h3><?php echo escape($data->username); ?></h3>

    <p>Full name: <?php echo escape($data->name); ?></p>

<?php
}
