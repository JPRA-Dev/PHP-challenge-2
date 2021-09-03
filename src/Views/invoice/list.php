<?php
?>
<main>
   <h1 class="invoicelisttitle">List of invoices</h1>

      <div class="containerinvoicelist">
         <table class="container1invoicelist">
            <tr>
               <th>Invoice Number</th>
               <th>Date</th>
               <th>Company</th>
               <th>Type</th>
            </tr>
            <?php $i = 0; foreach ($invoices as $invoice) { ?>
            <tr class="<?= $i % 2 === 0 ? 'row1' : 'row2' ?>">
               <td><a href="/invoice/show/<?=$invoice->invoice_id;?>"><?= $invoice->nbrinvoice?></a></td>
               <td><?php $date=new DateTime($invoice->dateinvoice); echo $date->format("d-m-Y"); ?></td>
               <td><?= $invoice->name ?></td>
               <td><?= $invoice->type ?></td>  
            </tr>
            <?php $i++; } ?>
         </table>
      </div>
</main>
