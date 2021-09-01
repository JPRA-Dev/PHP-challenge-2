<?php

?>
<main>
<h1 class="contacttitle">New Contact</h1>
   <div class="containercontact">
    <div class="container1contact">
	  <form action="" method="post">
  		<div class="lastname">
			<label for="name">Last Name :</label>
			<br>
			<input class="input" id="name" type="text" name="name" value="" placeholder="Name..." autocomplete="off" required autofocus>
		</div>	

		<div class="firstname">
			<label for="firstname">First Name :</label>
			<br>
			<input class="input" id="firstname" type="text" name="firstname" value="" placeholder="Firstname..." autocomplete="off" required >
		</div>

		<div class="phone">
			<label for="phone">Phone :</label>
			<br>
			<input class="input" id="phone" type="tel" name="phone" placeholder="Phone..." required>
		</div>

		<div class="email">
		<label for="email">Email:</label>
		<br>
		<input class="input" id="email" type="email" name="email" placeholder="Email@..." required><br>
		</div>

		
		<div class="company">
                        <label for="company">Company :</label>
                        <br>
                        <select class="input" name="company" id="company">
                            <option value="">--Please choose a Company--</option>
                            <?php foreach ($companies as $company) { ?>
                                   <option value="<?= $company->id; ?>"><?= $company->name; ?></option>
                            <?php } ?>
                        </select>
                    </div><br>
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
  

