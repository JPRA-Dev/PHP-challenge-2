<?php
?>
<main>
   <h1 class="companylist">Companies Directory</h1>
        <div class="containercompanylist">
             <h3>Clients</h3>
                  <table class="container1companylist">
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
       <div class="containercompanylist">
            <h3>Suppliers</h3>
               <table class="container1companylist">
                    <tr>
                        <th>Name</th>
                        <th>TVA</th>
                        <th>Country</th>
                    </tr>

                   <?php
                   $i = 0;
                   foreach ($companies as $company) {
                       if ($company->type === 'Supplier') { ?>
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
