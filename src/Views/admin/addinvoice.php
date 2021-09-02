<?php

?>
<main >
	<h1 class="invoicetitle">New Invoice </h1>
		<div class="containerinvoice">
			<div class="container1invoice">
				<form action="" method="post">
					<div class="invoicenumber">
						<label for="invoicenumber">Invoice Number :</label>
						<br>
						<input class="input" type="text" id="invoicenumber" name="invoicenumber" value="" placeholder="Invoice Number..." autocomplete="off" required>
					</div>	

					<div class="date">
						<label for="date">Invoice Date :</label>
						<br>
						<input class="input" type="date" id="date" name="date" value="" placeholder="Date of Invoice..." autocomplete="off" required>
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
					</div>

					<div class="contactinvoice">
						<label for="contact">Contact Name for the Invoice:</label>
						<br>
						<select class="input" name="contact" id="contact">
						<option value="">--Please choose a contact person--</option>
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

