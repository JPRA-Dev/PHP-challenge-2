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
