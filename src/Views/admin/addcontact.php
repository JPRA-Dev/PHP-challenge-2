<?php

?>
<main>
   <div class="container">
  <h1>Add a new contact</h1>
	  <div class="container1">
	<form action="" method="post">
		<div class="lastname">
			<label for="name">Last Name :</label>
			<br>
			<input class="input" type="text" name="name" value="" placeholder="Name..." autocomplete="off" required autofocus>
		</div>	

		<div class="firstname">
			<label for="firstname">First Name :</label>
			<br>
			<input class="input" type="text" name="firstname" value="" placeholder="Firstname..." autocomplete="off" required >
		</div>

		<div class="phone">
			<label for="phone">Phone :</label>
			<br>
			<input class="input" type="tel" name="phone" placeholder="Phone..." required>
		</div>

		<div class="email">
		<label for="pwd">Email:</label>
		<br>
		<input class="input" type="email" name="email" placeholder="Email@..." required><br>
		</div>

		<div class="company">
		<label for="company">Company :</label>
		<br>
		<input class="input" type="text" name="company" placeholder="Company..." required><br>
		</div>
		<br>
		<div class="button">
		<input  type="hidden" name="token" value="<">
		<button class="submit" type="submit" name="submit">Submit</button>
		</div>
	</form>
   </div>
  </div>
    </main>
  

