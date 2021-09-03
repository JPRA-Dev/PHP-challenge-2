<?php
?>
<main>
    <h1 class="companylist">Clients Directory</h1>
        <div class="containercompanylist">
            <table class="container1companylist">
                 <tr>
                   <th class="titlecompanylist" colspan="3">Clients</th>
                 </tr>
                 <tr>
                    <th>Name</th>
                    <th>TVA</th>
                    <th>Country</th>
                 </tr>

                <?php
                $i = 0;
                foreach ($companies as $company) {
                    if ($company->type === 'Client') { ?>
                    <tr class="<?= $i % 2 === 0 ? 'row1' : 'row2' ?>">
                        <td><a href="/company/show/<?= $company->id; ?>"><?= $company->name?></a></td>
                        <td><?= $company->vatnumber ?></td>
                        <td><?= $company->country ?></td>
                    </tr>
                <?php $i++;
                    }
                } ?>
            </table>
        </div>
</main>
