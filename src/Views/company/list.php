<?php
?>
<main>
   <h1 class="companylist">COGIP: Companies Directory</h1>
        <div class="containercompanylist">
             <h3>Clients</h3>
                  <table class="container1companylist">
                    <tr>
                       <th>Name</th>
                       <th>TVA</th>
                       <th>Country</th>
                    </tr>

                <?php $i = 0; foreach ($companies as $company) { ?>
                    <tr class="<?= $i % 2 === 0 ? 'row1' : 'row2' ?>">
                        <td><a href="/company/show/1"><?= $company->name?></a></td>
                        <td><?= $company->vatnumber ?></td>
                        <td><?= $company->country ?></td>
                        <!--<td><?= $company->type ?></td> voir avec Adrien comment on fait pour selectioner seulement les types clients!-->
                    </tr>
                <?php $i++; } ?>
                    
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

                    <?php $i = 0; foreach ($companies as $company) { ?>
                        <tr class="<?= $i % 2 === 0 ? 'row1' : 'row2' ?>">
                            <td><a href="/company/show/1"><?= $company->name?></a></td>
                            <td><?= $company->vatnumber ?></td>
                            <td><?= $company->country ?></td>
                            <!--<td><?= $company->type ?></td> voir avec Adrien comment on fait pour selectioner seulement les types suppliers!-->
                        </tr>
                    <?php $i++; } ?>    
                    
              </table>
        </div>  
</main>
