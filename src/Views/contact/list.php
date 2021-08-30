<?php
?>
<main>
    <h1>COGIP : Contact Directory</h1>

    <div class="container">
        <table class="container1">
            <tr>
                <th>Name</th>
                <th>Telephone</th>
                <th>Email</th>
                <th>compagny</th>
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