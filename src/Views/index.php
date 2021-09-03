<?php
?>

<main>
    <h1 class="indexviewstitle">Welcome to COGIP</h1>

        <div class="containerindexviews">

            <table class="container1indexviews">
                <tr>
                    <th class="title1indexviews" colspan="4">Last Invoices</th>
                </tr>
                <tr>
                     <th>Invoice Number</th>
                     <th>Date</th>
                     <th>Company</th>
                </tr>
                <?php $i = 0; foreach ($invoices as $invoice) { ?>
                <tr class="<?= $i % 2 === 0 ? 'row1' : 'row2' ?>">
                    <td><?= $invoice->nbrinvoice?></td>
                    <td><?php $date=new DateTime($invoice->dateinvoice); echo $date->format("d-m-Y"); ?></td>
                    <td><?= $invoice->name ?></td>
                </tr>
                <?php $i++; } ?>
            </table>
            <table class="container2indexviews">
      
                <tr>
                   <th class="title2indexviews" colspan="5">Last Companies</th>
                </tr>
                <tr>
                   <th>Name</th>
                   <th>TVA</th>
                   <th>Country</th>
                   <th>Type</th>

                </tr>
                <?php $i = 0; foreach ($companies as $company) { ?>
                <tr class="<?= $i % 2 === 0 ? 'row1' : 'row2' ?>">
                    <td><?= $company->name?></td>
                    <td><?= $company->vatnumber ?></td>
                    <td><?= $company->country ?></td>
                    <td><?= $company->type ?></td>
                </tr>
                <?php $i++; } ?>
            </table>

            <table class="container3indexviews">
                <tr>
                     <th class="title3indexviews" colspan="5" >Last Contacts</th>
                </tr>
                <tr>
                    <th>Name</th>
                    <th>Telephone</th>
                    <th>E-mail</th>
                    <th>Company</th>
                </tr>
                <?php $i = 0; foreach ($contacts as $contact) { ?>
                <tr class="<?= $i % 2 === 0 ? 'row1' : 'row2' ?>">
                     <td><?= $contact->firstname . ' ' . $contact->lastname ?></td>
                     <td><?= $contact->telephone ?></td>
                     <td><?= $contact->email ?></td>
                     <td><?= $contact->name ?></td>
                </tr>
                <?php $i++; } ?>
            </table>
        </div>  
</main>