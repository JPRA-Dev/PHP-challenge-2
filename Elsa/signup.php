<?php
    
    require_once 'includes/init.inc.php';

	if(Input::exists()){
		if(Token::check(Input::get('token'))){
			$validate = new Validate();
			$validation= $validate->check($_POST,array(
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
					'matches'=>'pwd'
				)
			));
			
			if($validation->passed()){
				$user = new User();

				//$salt= Hash::salt(32);

				try{

					$user->create(array(
						'username'=>Input::get('username'),
						'pwd'=>Hash::make(Input::get('pwd')),
						//'salt'=>$salt,
						'name'=>Input::get('name'),
						'joined'=>date ('d-m-Y H:i:s'),
						'group'=>1
					));

					Session::flash('home','You have been registered and can now log in!');
					Redirect::to('index.php');

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
	<link rel="stylesheet" href="signup.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
     
