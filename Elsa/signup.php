<?php
    
    require_once 'includes/init.inc.php';

	if(Input::exists()){
		if(Token::check(Input::get('token'))){
			$validate = new Validate();
			$validation= $validate->check($_Post,array(
				'name'=>array(
					'required'=>true,
					'min'=>2,
					'max'=>50
				),
				'username'=>array(
					'required' =>true,
					'min' =>2,
					'max'=>20,
					'unique'=>'users'
				),
				'email'=>array(
					'required'=>true,

				),
				'pwd'=>array(
					'required'=>true,
					'min'	=>6
				),
				'pwdagain'=>array(
					'required'=>true,
					'matches'=>'password'
				)
			));
			
			if($validation->passed()){
				$user = new User();
				try{

					$user->create(array(
						'username'=>'',
						'pwd'=>'',
						'salt'=>'',
						'name'=>'',
						'joined'=>'',
						'group'=>''
					));

				}catch(Exception $e){
					die($e->getMessage());
				}
				Session::flash('Success', 'You registered successfully!');
			}else{
				foreach($validation->errors()as$error){
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
			<input type="text" name="name" value="<?php echo escape(Input::get('name')); ?>" placeholder="Name..." autocomplete="off">
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
		<button type="submit" name="submit">Submit</button>
	</form>
</body>
</html>
