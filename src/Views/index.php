<?php
?>

<main>
    <h1>Welcome to COGIP</h1>

        <div class="container">

            <table class="container1">
                  <tr>
                      <th class="title1" colspan="4">Last Invoices</th>
                  </tr>
                  <tr>
                       <th>Invoice Number</th>
                       <th>Dates</th>
                       <th>compagny</th>
                       <th></th>
                  </tr>
                <?php $i = 0; foreach ($invoices as $invoice) { ?>
                    <tr class="<?= $i % 2 === 0 ? 'row1' : 'row2' ?>">
                        <td><?= $invoice->nbrinvoice?></td>
                        <td><?= $invoice->dateinvoice ?></td>
                        <td><?= $invoice->name ?></td>
                        <td><a href="/admin/invoice/delete<?php echo $invoice->invoice_id; ?>">:wastebasket:</td>
                    </tr>
                    <?php $i++; } ?>
            </table>


            <table class="container2">
      
                  <tr>
                     <th class="title2" colspan="5">Last Companies</th>
                  </tr>
                  <tr>
                     <th>Names</th>
                     <th>TVA</th>
                     <th>country</th>
                     <th>Type</th>
                     <th></th>
                  </tr>
                  <tr class="row1">
                     <td>Raviga</td>
                     <td>US456 654 342</td>
                     <td>United States</td>
                     <td>Fournisseur</td>
                     <td><a href="">🗑️</td>
                  </tr>
                  <tr class="row2">
                     <td>Dunder Mifflin</td>
                     <td>US678 765 765</td>
                     <td>United States</td>
                     <td>Clients</td>
                     <td><a href="">🗑️</td>
                  </tr>
                  <tr class="row1">
                     <td>Pierre Cailloux</td>
                     <td>FR 678 908 654</td>
                     <td>France</td>
                     <td>Fournisseur</td>
                     <td><a href="">🗑️</td>
                  </tr>
                  <tr class="row2">
                     <td>Belgalol</td>
                     <td>BE0876 654 665</td>
                     <td>Belgique</td>
                     <td>Fournisseur</td>
                     <td><a href="">🗑️</td>
                  </tr>
                  <tr class="row1">
                     <td>Jouets Jean-Michel</td>
                     <td>FR 677 544 000</td>
                     <td>France</td>
                     <td>Clients</td>
                     <td><a href="">🗑️</td>
                  </tr>
          </table>

          <table class="container3">
                    <tr>
                         <th class="title3" colspan="5" >Last Contacts</th>
                    </tr>
                     <tr>
                         <th>Names</th>
                         <th>phone</th>
                         <th>E-mail</th>
                         <th>compagny</th>
                         <th></th>
                     </tr>
                    <tr class="row1">
                         <td>Peter Gregory</td>
                         <td>555-4567</td>
                         <td>peter.gregory@raviga.com</td>
                         <td>Raviga</td>
                         <td><a href="">🗑️</td>
                    </tr>
                    <tr class="row2">
                         <td>Cameron Howe</td>
                         <td>555-78967</td>
                         <td>cam.howe@mutiny.net</td>
                         <td>Mutiny</td>
                         <td><a href="">🗑️</td>
                    </tr>
                    <tr class="row1">
                         <td>Gavin Belson</td>
                         <td>555-4213</td>
                         <td>gavin@hooli.com</td>
                         <td>Hoolir</td>
                         <td><a href="">🗑️</td>
                    </tr>
                    <tr class=row2>
                         <td>Jiang Yang</td>
                         <td>555-4567</td>
                         <td>jian.yan@phoque.off</td>
                         <td>Phoque Off</td>
                         <td><a href="">🗑️</td>
                    </tr>
                    <tr class="row1">
                         <td>Bertram Gilfoyle</td>
                         <td>555-098</td>
                         <td>gilfoyle@piedpiper.com</td>
                         <td>Pied Piper</td>
                         <td><a href="">🗑️</td>
                    </tr>
             </table>
         </div>  
</main>