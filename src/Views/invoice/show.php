<?php
?>
<main>
   <h1 class="invoiceshowtitle">Invoice:</h1>

      <div class="containerinvoiceshow">
         <h3>Company linked to the invoice</h3>
             <table class="container1invoiceshow">
                <tr>
                   <th>Name</th>
                   <th>TVA</th>
                   <th>Type company</th>
                </tr>
                <tr>
                   <td><?php echo $invoice->name; ?></td>
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
                   <td>Meredith Palmer</td>
                   <td>meredith.palmer@jouetsjm.fr</td>
                   <td>06 85 69 74 58</td>
                </tr>
             </table>
       </div>
</main>
