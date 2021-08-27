<?php
?>

   <main >
   <h1>New Invoice </h1>
        <div class="container">
          <div class="container1">
	         <form action="" method="post">
		         <div class="invoicenumber">
			        <label for="invoicenumber">Invoice Number :</label>
			        <br>
			        <input class="input" type="number" name="invoicenumber" value="" placeholder="Invoice Number..." autocomplete="off" required>
		         </div>	

		         <div class="date">
			        <label for="date">Date of Invoice :</label>
			        <br>
			        <input class="input" type="date" name="date" value="" placeholder="Date of Invoice..." autocomplete="off" required>
		         </div>

		         <div class="company">
			        <label for="company">Phone :</label>
			        <br>
			        <input class="input" type="text" name="company" placeholder="Company..." required>
		         </div>

		         <div class="contact">
		            <label for="contact">Contact Name for the Invoice:</label>
		            <br>
		            <input class="input" type="text" name="contact" placeholder="Name..." required><br>
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

