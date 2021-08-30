<?php
?>
    <main>
      <h1 class="invoicelisttitle">COGIP: List of invoices:</h1>

        <div class="containerinvoicelist">
             <table class="container1invoicelist">
                 <tr>
                    <th>Invoice Number</th>
                    <th>Dates</th>
                    <th>Companies</th>
                    <th>Type</th>
                 </tr>
               <?php $i = 0; foreach ($invoices as $invoice) { ?>
               <tr class="<?= $i % 2 === 0 ? 'row1' : 'row2' ?>">
                  <td><a href="/invoice/show/1"><?= $invoice->nbrinvoice?></a></td>
                  <td><?= $invoice->dateinvoice ?></td>
                  <td><?= $invoice->name ?></td>
                  <td><?= $invoice->type ?></td>  
               </tr>
               <?php $i++; } ?>
            </table>
       </div>
</main>
