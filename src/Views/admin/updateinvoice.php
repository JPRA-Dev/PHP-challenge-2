<?php
$invoice->dateinvoice = isset($invoice->dateinvoice) ? $invoice->dateinvoice = new DateTime($invoice->dateinvoice) : $invoice->dateinvoice;
?>
<main >
    <h1 class="invoicetitle">Update Invoice </h1>
		<div class="containerinvoice">
			<div class="container1invoice">
				<form action="" method="post">

					<div class="invoicenumber">
						<label for="invoicenumber">Invoice Number :</label>
						<input class="inputinvoice" type="text" id="invoicenumber" name="invoicenumber" value="<?= isset($invoice->nbrinvoice) ? $invoice->nbrinvoice : '' ?>" placeholder="Invoice Number..." autocomplete="off" required>
					</div>	

					<div class="date">
						<label for="date">Date of Invoice :</label>
						<input class="inputinvoice" type="date" id="date" name="date" value="<?= isset($invoice->dateinvoice) ? $invoice->dateinvoice->format('Y-m-d') : '' ?>" placeholder="Date of Invoice..." autocomplete="off" required>
					</div>

					<div class="company">
						<label for="company">Company :</label>
						<select class="inputinvoice" name="company" id="company">
							<option value="">--Please choose a Company--</option>
							<?php foreach ($companies as $company) { ?>
           						<option <?php if(isset($invoice->company_id) && $invoice->company_id == $company->id) { ?>selected<?php } ?> value="<?= $company->id; ?>"><?= $company->name; ?></option>
        					<?php } ?>
						</select>
					</div>

					<div class="contactinvoice">
						<label for="contact">Contact Name for the Invoice:</label>
						<select class="inputinvoice" name="contact" id="contact">
						<option value="">--Please choose a contact person--</option>
							<?php foreach ($contacts as $contact) { ?>
            					<option <?php if(isset($invoice->contact_person_id) && $invoice->contact_person_id == $contact->contact_person_id) { ?>selected<?php } ?> value="<?= $contact->contact_person_id; ?>"><?= $contact->firstname . ' ' . $contact->lastname; ?></option>
        					<?php } ?>
						</select>
					</div>
					
					<div class="button">
						<input  type="hidden" name="token" value="<">
						<button class="submit" type="submit" name="submit">Submit</button>
					</div>
				</form>
			</div>
		</div>
</main>

