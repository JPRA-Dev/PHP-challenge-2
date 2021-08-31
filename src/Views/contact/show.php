<?php
?>
<main>
    <h1 class="contactshowtitle">Contact</h1>

    <div class="contact">
        <p>company : <?= $contact->company_id?></p>
        <p>email : <?=$contact->email?></p>
        <p>phone :<?=$contact->telephone?></p>
    </div>

    <div class="containercontactshow">
       <h3>Contact  person for these invoices: <?=$contact->firstname . '' . $contact->lastname?> </h3>

          <table class="container1contactshow">
              <tr>
                 <th>Invoice Number</th>
                 <th>Date</th>
              </tr>
              <?php $i = 0; foreach ($invoices as $invoice) { ?>
               <tr class="<?= $i % 2 === 0 ? 'row1' : 'row2' ?>">
                   <td><a href="/invoice/show/<?= $invoice->invoice_id ?>"><?php echo $invoice->nbrinvoice; ?></a></td>
                   <td><?php echo $invoice->dateinvoice; ?></td>
               </tr>
           <?php $i++; } ?>
          </table>
    </div>
</main>
