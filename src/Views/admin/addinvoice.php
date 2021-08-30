<?php

?>
<main >
	<h1 class="invoicetitle">New Invoice </h1>
		<div class="containertitle">
			<div class="container1title">
				<form action="" method="post">
					<div class="invoicenumber">
						<label for="invoicenumber">Invoice Number :</label>
						<br>
						<input class="input" type="text" id="invoicenumber" name="invoicenumber" value="" placeholder="Invoice Number..." autocomplete="off" required>
					</div>	

					<div class="date">
						<label for="date">Date of Invoice :</label>
						<br>
						<input class="input" type="date" id="date" name="date" value="" placeholder="Date of Invoice..." autocomplete="off" required>
					</div>

					<div class="company">
						<label for="company">Company :</label>
						<br>
						<select name="company" id="company">
							<option value="">Please select a company</option>
							<?php foreach ($companies as $company) { ?>
           						<option value="<?= $company->id; ?>"><?= $company->name; ?></option>
        					<?php } ?>
						</select>
					</div>

					<div class="contact">
						<label for="contact">Contact Name for the Invoice:</label>
						<br>
						<select name="contact" id="contact">
						<option value="">Please select a contact</option>
							<?php foreach ($contacts as $contact) { ?>
            					<option value="<?= $contact->contact_person_id; ?>"><?= $contact->firstname . ' ' . $contact->lastname; ?></option>
        					<?php } ?>
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

