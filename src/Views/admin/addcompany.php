<?php
?>
   <main >
   <h1>New Company </h1>
        <div class="container">
          <div class="container1">
	         <form action="" method="post">
		         <div class="companyname">
			        <label for="companyname">Company Name :</label>
			        <br>
			        <input class="input" id="companyname" type="text" name="companyname" value="" placeholder="Company name..." autocomplete="off" required autofocus>
		         </div>	

		         <div class="tva">
			        <label for="tavnumber">TVA Number :</label>
			        <br>
			        <input class="input" id="tavnumber" type="text" name="tvanumber" value="" placeholder="BEXXXXXXXX..." autocomplete="off" required>
		         </div>

		         <div class="phone">
			        <label for="phonenumber">Phone Number :</label>
			        <br>
			        <input class="input" id="phonenumber" type="tel" name="phonenumber" placeholder="+32 xx xx xx..." required>
		         </div>

		         <div class="companytype">
		            <label for="companytype">Company Type :</label>
		            <br>
		            <select class="input"  id="companytype" name="companytype" required>
                        <div class="input">
                        <option value="">--Please choose a type of Company--</option>
                        <option value="provider">Provider</option>
                        <option value="client">Client</option>
                        </div>
                    </select>
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
