<?php
global $user;
?>
<main>
    <div class="addbutton">

        <h1 class="indextitle">Hello, <?= $user->data()[0]->firstname . ' ' . $user->data()[0]->lastname ?>!<br> What would you like to do today?</h1>

        <div class="add">
            <div class="buttonindex">
                <button class="submit1" type="submit" name="addinvoice"><a href="/admin/addinvoice">Add New Invoice</a></button>
            </div>

            <div class="buttonindex">
                <button class="submit2" type="submit" name="addcompany"><a href="/admin/addcompany">Add New Company</a></button>
            </div>

            <div class="buttonindex">
                <button class="submit3" type="submit" name="addcontact"><a href="/admin/addcontact">Add New Contact</a></button>
            </div>
        </div>
    </div>

    <div class="containerindex">

        <table class="container1index">

            <thead>
                <tr>
                    <th class="titletab1" colspan="4">Last Invoices</th>
                </tr>

                <tr>
                    <th>Invoice Number</th>
                    <th>Date</th>
                    <th>Company</th>
                    <?php if ($has_permission_for_delete || $has_permission_for_update) { ?><th></th><?php } ?>
                </tr>
            </thead>
            <tbody>
            <?php $i = 0; foreach ($invoices as $invoice) { ?>
                <tr class="<?= $i % 2 === 0 ? 'row1' : 'row2' ?>">
                    <td><a href="/invoice/show/<?=$invoice->invoice_id;?>"><?= $invoice->nbrinvoice?></a></td>
                    <td><?php $date=new DateTime($invoice->dateinvoice); echo $date->format("d-m-Y"); ?></td>
                    <td><?= $invoice->name ?></td>
                    <?php if ($has_permission_for_delete || $has_permission_for_update) { ?>
                        <td>
                            <?php if ($has_permission_for_update) { ?> <a class="delete" href="/admin/invoice/update/<?php echo $invoice->invoice_id; ?>">✏️️</a> <?php } ?>
                            <?php if ($has_permission_for_delete) { ?> <a class="delete" href="/admin/invoice/delete/<?php echo $invoice->invoice_id; ?>">🗑️</a> <?php } ?>
                        </td>
                    <?php } ?>
                </tr>
                <?php $i++; } ?>
            </tbody>
        </table>

        <table class="container2index">

            <thead>
                <tr>
                    <th class="titletab2" colspan="5">Last Companies</th>
                </tr>
                <tr>
                    <th>Name</th>
                    <th>TVA</th>
                    <th>Country</th>
                    <th>Type</th>
                    <?php if ($has_permission_for_delete || $has_permission_for_update) { ?><th></th><?php } ?>
                </tr>
            </thead>
            <tbody>
            <?php $i = 0; foreach ($companies as $company) { ?>
                <tr class="<?= $i % 2 === 0 ? 'row1' : 'row2' ?>">
                    <td><a href="/company/show/<?= $company->id;?>"><?= $company->name?></a></td>
                    <td><?= $company->vatnumber ?></td>
                    <td><?= $company->country ?></td>
                    <td><?= $company->type ?></td>
                    <?php if ($has_permission_for_delete || $has_permission_for_update) { ?>
                        <td>
                            <?php if ($has_permission_for_update) { ?> <a class="delete" href="/admin/company/update/<?php echo $company->id; ?>">✏️️</a> <?php } ?>
                            <?php if ($has_permission_for_delete) { ?> <a class="delete" href="/admin/company/delete/<?php echo $company->id; ?>">🗑️</a> <?php } ?>
                        </td>
                    <?php } ?>
                </tr>
                <?php $i++; } ?>
            </tbody>
        </table>

        <table class="container3index">

            <thead>
                <tr>
                    <th class="titletab3" colspan="5">Last Contacts</th>
                </tr>
                <tr>
                    <th>Name</th>
                    <th>Telephone</th>
                    <th>E-mail</th>
                    <th>Company</th>
                    <?php if ($has_permission_for_delete || $has_permission_for_update) { ?><th></th><?php } ?>
                </tr>

            </thead>
            <tbody>
            <?php $i = 0; foreach ($contacts as $contact) { ?>
                <tr class="<?= $i % 2 === 0 ? 'row1' : 'row2' ?>">
                    <td><a href="/contact/show/<?=$contact->contact_person_id;?>"><?= $contact->firstname . ' ' . $contact->lastname ?></a></td>
                    <td><?= $contact->telephone ?></td>
                    <td><?= $contact->email ?></td>
                    <td><?= $contact->name ?></td>
                    <?php if ($has_permission_for_delete || $has_permission_for_update) { ?>
                        <td>
                            <?php if ($has_permission_for_update) { ?> <a class="delete" href="/admin/contact/update/<?php echo $contact->contact_person_id; ?>">✏️️</a> <?php } ?>
                            <?php if ($has_permission_for_delete) { ?> <a class="delete" href="/admin/contact/delete/<?php echo $contact->contact_person_id; ?>">🗑️</a> <?php } ?>
                        </td>
                    <?php } ?>
                </tr>
                <?php $i++; } ?>

            </tbody>
        </table>
    </div>
</main>

