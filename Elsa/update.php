<?php
require_once 'includes/init.inc.php';

$user = new User();

if(!$user->isloggedIn()){
    Redirect::to('index.php');
}
if(Input::exists()){
	if(Token::check(Input::get('token'))){
		$validate= new Validate();
		$validation=$validate->check($_POST,array(
			'name'=>array(
				'required'=>true,
				'min'=>2,
				'max'=>50
			)
		));
	if($validation->passed()){
		
		try{//add items to update
			$user->update(array(
				'name'=>Input::get('name')
			));
			Session::flash('home','Your details have been updated.');
			Redirect::to('index.php');
		}catch(Exception $e){
			die($e->getMessage());
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
	<title>Add a user</title>
	<!--<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">-->
</head>
<body>
	
	<h1>Add User</h1>
	<form action="" method="post">
		<div>
			<label for="name">name :</label>
			<input type="text" name="name" value="<?php echo escape($user->data()->name); ?>" placeholder="Name..." autocomplete="off">
		</div>	

		<div>
			<label for="username">Username :</label>
			<input type="text" name="username" value="<?php echo escape(Input::get('username')); ?>" placeholder="Username..." autocomplete="off">
		</div>

		<div>
			<label for="email">Email :</label>
			<input type="email" name="email" placeholder="Email...">
		</div>

		<div>
		<label for="pwd">Password :</label>
		<input type="password" name="pwd" placeholder="Password..."><br>
		</div>

		<div>
		<label for="pwdagain">Password again :</label>
		<input type="password" name="pwdagain" placeholder="Password again..."><br>
		</div>

		<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
		<button type="submit" name="update">Update</button>
	</form>
</body>
</html>