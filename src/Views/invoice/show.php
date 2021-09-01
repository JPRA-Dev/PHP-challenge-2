<?php

?>
<main>
   <h1 class="invoiceshowtitle">Invoice: <?= $invoice->nbrinvoice?></h1>

      <div class="containerinvoiceshow">
         <h3>Company linked to the invoice</h3>
             <table class="container1invoiceshow">
                <tr>
                   <th>Name</th>
                   <th>TVA</th>
                   <th>Type company</th>
                </tr>
                <tr>
                   <td><a href="/company/show/1"><?php echo $invoice->name; ?></a></td>
                   <td><?php echo $invoice->vatnumber; ?></td>
                   <td><?php echo $invoice->type; ?></td>
                </tr>
             </table>
         <h3>Contact person</h3>
            <table class="container1invoiceshow">
                <tr>
                   <th>Name</th>
                   <th>Email</th>
                   <th>Phone</th>
                </tr>
                <tr>
                  <td><a href="/contact/show/1"><?php echo $contact->firstname . ' ' . $contact->lastname; ?></a></td>
                  <td><?php echo $contact->email; ?></td>
                  <td><?php echo $contact->telephone; ?></td>
                </tr>
             </table>
       </div>
</main>
