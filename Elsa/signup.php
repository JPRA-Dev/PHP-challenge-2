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
	<link rel="stylesheet" href="signup.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
     
