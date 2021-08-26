<?php
require_once 'includes/init.inc.php';

if(Input::exists()){
	if(Token::check(Input::get('token'))){


		$validate = new Validate();
		$validation=$validate->check($_POST,array(
			'username'=>array('required'=>true),
			'pwd'=>array('required'=>true)
		));
		if($validation->_passed){
			$user=new User();
			$remember=(Input::get('remember')==='on') ?true:false;
			$login=$user->login(Input::get('username'),Input::get('pwd',$remember));

			if($login){
				Redirect::to('index.php');
			}else{
				echo '<p> Sorry, Log in failed!</p>';
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
	<title>Log In</title>
	<!--<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">-->
</head>
<body>
	<!--<a href="/randonnee/read.php">Liste des données</a>-->
	<h1>Add User</h1>
	<form action="" method="post">
		<div>
			<label for="username">Username :</label>
			<input type="text" name="username" placeholder="Username/email..." autocomplete="off">
		</div>

		<div>
            <label for="pwd">Password :</label>
            <input type="password" name="pwd" placeholder="Password..." autocomplete="off"><br />
		</div>

		<div>
            <label for="remember">
            <input type="checkbox" name="remember">Remember me
			</label>
		</div>

		<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
		<button type="submit" value='Log in'>Log in</button>
	</form>
</body>
</html>