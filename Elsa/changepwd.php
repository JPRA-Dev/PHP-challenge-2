<?php
require_once 'includes/init.inc.php';
$user=new User();

if(!$user->isloggedIn()){
    Redirect::to('index.php');
}

if(Input::exists()){
    if(Token::check(Input::get('token'))){

        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'password_current'=> array(
                'required'=>true,
                'min'=>6
            ),
            'password_new'=> array(
                'required'=>true,
                'min'=>6
            ),
            'password_new_again'=> array(
                'required'=>true,
                'min'=>6,
                'matches'=>'password_new'
            )
        ));
        if($validation->passed()){
            if(Hash::make(Input::get('password_current'), $user->data())!== $user->data()->pwd){
                echo'Your current password is wrong.';
            }else{
                $user->update(array(
                    'pwd'=>Hash::make(Input::get('pwdnew')),
                    
                ));

                Session::flash('home','Your password has been changed.');
                Redirect::to('index.php');
            }
        }else{
            foreach($validation->errors() as $error){
                echo $error,'<br>';
            }   
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<!--<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">-->
</head>
<body>
	
	<h1></h1>
	<form action="" method="post">
		
		<div>
		<label for="password_current">Current Password :</label>
		<input type="password" name="password_current" placeholder="Current Password..."><br>
		</div>

		<div>
		<label for="password_new">New Password :</label>
		<input type="password" name="password_new" placeholder="New Password..."><br>
		</div>

        <div>
		<label for="password_new_again">New Password again :</label>
		<input type="password" name="password_new_again" placeholder="New Password again..."><br>
		</div>

		<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
		<button type="submit" name="change">Change</button>
	</form>
</body>
</html>