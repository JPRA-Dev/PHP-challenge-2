<?php
?>
<main>
    <h1 class="contactshowtitle">Contact</h1>
        <div class="contact">
            <p>Company : <?= $contact->name?></p>
            <p>E-mail : <?=$contact->email?></p>
            <p>Telephone :<?=$contact->telephone?></p>
        </div>

        <div class="containercontactshow">
            <table class="container1contactshow">
                 <tr>
                    <th class="titlecontactshow" colspan="2">Contact  person for these invoices: <?=$contact->firstname . ' ' . $contact->lastname?></th>
                 </tr>
                 <tr>
                   <th>Invoice Number</th>
                   <th>Date</th>
                 </tr>
                 <?php $i = 0; foreach ($invoices as $invoice) { ?>
                 <tr class="<?= $i % 2 === 0 ? 'row1' : 'row2' ?>">
                     <td><a href="/invoice/show/<?= $invoice->invoice_id ?>"><?php echo $invoice->nbrinvoice; ?></a></td>
                     <td><?php $date=new DateTime($invoice->dateinvoice); echo $date->format("d-m-Y"); ?></td>
                 </tr>
                 <?php $i++; } ?>
            </table>
        </div>
</main>
