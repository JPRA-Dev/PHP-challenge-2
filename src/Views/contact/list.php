<?php
?>
<main>
    <h1 class="contactlisttitle">COGIP : Contact Directory</h1>

    <div class="containercontactlist">
        <table class="container1contactlist">
            <tr>
                <th>Name</th>
                <th>Telephone</th>
                <th>Email</th>
                <th>company</th>
            </tr>
            <?php $i = 0; foreach ($contacts as $contact) { ?>
            <tr class="<?= $i % 2 === 0 ? 'row1' : 'row2' ?>">
                <td><a href="/contact/show/1"><?= $contact->firstname . ' ' . $contact->lastname ?></a></td>
                <td><?= $contact->telephone ?></td>
                <td><?= $contact->email ?></td>
                <td><?= $contact->name ?></td>
            </tr>
            <?php $i++; } ?>
        </table>
    </div>
</main>