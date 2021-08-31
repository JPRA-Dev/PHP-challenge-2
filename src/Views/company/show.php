<?php
?>
<main>

<h1 class="companyshowtitle">Company:</h1> 

   <div class="tvatype">
      <p>TVA: <?= $company->vatnumber ?></p>
      <p>Type: <?= $company->type ?></p>
   </div>

  <div class="containercompanyshow">
    <h3>Contact Persons</h3>
        <table class="container1companyshow">
           <tr>
              <th>Name</th>
              <th>Phone</th>
              <th>Email</th>
           </tr>
            <?php $i = 0; foreach ($contacts as $contact) { ?>
                <tr class="<?= $i % 2 === 0 ? 'row1' : 'row2' ?>">
                    <td><a href="/contact/show/<?= $contact->contact_person_id ?>"><?php echo $contact->lastname . ' ' . $contact->lastname; ?></a></td>
                    <td><?php echo $contact->telephone; ?></td>
                    <td><?php echo $contact->email; ?></td>
                </tr>
            <?php $i++; } ?>
        </table>

    <h3>Invoices</h3>
       <table class="container1companyshow">
           <tr>
               <th>Invoice Number</th>
               <th>Date</th>
               <th>Contact Person</th>
            </tr>

           <?php $i = 0; foreach ($invoices as $invoice) { ?>
               <tr class="<?= $i % 2 === 0 ? 'row1' : 'row2' ?>">
                   <td><a href="/invoice/show/<?= $invoice->invoice_id ?>"><?php echo $invoice->nbrinvoice; ?></a></td>
                   <td><?php echo $invoice->dateinvoice; ?></td>
                   <td><?php echo $invoice->firstname . ' ' . $invoice->lastname; ?></td>
               </tr>
           <?php $i++; } ?>
        </table>
    </div>
</main>
