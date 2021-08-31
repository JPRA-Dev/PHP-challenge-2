<?php

use App\Helpers\TokenHelper;

?>


<main >
	<h1 class="logintitle">Welcome to COGIP</h1>
    <div class="containerlogin">
	    <div class="container1login">
	        <form action="" method="post">
		        <div class="username">
			        <label class="usernamelabel" for="username">Your Username:</label>
			        <br>
			        <input class="input" type="text" name="username" value="" placeholder="Username..." autocomplete="off" required autofocus>
		        </div>	

		        <div class="pwd">
			        <label for="password">Your Password :</label>
			        <br>
			        <input class="input" type="password" name="password" value="" placeholder="Password..." autocomplete="off" required>
		        </div>
                <br>
						
				<div class="remember">
					<label for="remember">
					<input type="checkbox" name="remember">Remember me
					</label>
				</div>

				<div class="button">
					<input type="hidden" name="token" value="<?php echo TokenHelper::generate(); ?>">
		            <button class="submit" type="submit" name="submit">Sign in</button>
		        </div>
	        </form>
        </div>
	</div>	
</main>