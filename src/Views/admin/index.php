<?php
?>
 <main>
        <div class="addbutton">
        
           <h1 class="indextitle">Hello, <!--<?=$user->firstname . '' . $user->lastname?>!-->!<br> What do you want to do today?</h1>
         
          <div class="add">
                <div class="buttonindex">
                <input  type="hidden" name="token" value="<">
                <button class="submit1" type="submit" name="addinvoice"><a href="../admin/addinvoice">Add New Invoice</a></button>
            </div>

                <div class="buttonindex">
                <input  type="hidden" name="token" value="<">
                <button class="submit2" type="submit" name="addcompany"><a href="../admin/addcompany">Add New Company</a></button>
            </div>

                <div class="buttonindex">
                <input  type="hidden" name="token" value="<">
                <button class="submit3" type="submit" name="addcontact"><a href="../admin/addcontact">Add New Contact</a></button>
            </div>
        </div>
    </div>
     
<div class="containerindex">

<table class="container1index">

            <theader>
                <tr>
                    <th class="titletab1" colspan="4">Last Invoices</th>
                </tr>

                <tr>
                    <th>Invoice Number</th>
                    <th>Dates</th>
                    <th>company</th>
                    <th></th>
                </tr>
             </theader>
        <tbody>
            <?php $i = 0; foreach ($invoices as $invoice) { ?>
                <tr class="<?= $i % 2 === 0 ? 'row1' : 'row2' ?>">
                    <td><a href="/invoice/show/1"><?= $invoice->nbrinvoice?></a></td>
                    <td><?= $invoice->dateinvoice ?></td>
                    <td><?= $invoice->name ?></td>
                    <td><a class="delete" href="/admin/invoice/delete<?php echo $invoice->invoice_id; ?>">🗑️</a></td>
                </tr>
            <?php $i++; } ?>
        </tbody>
        </table>


    <table class="container2index">
      
        <theader>
             <tr>
                 <th class="titletab2" colspan="5">Last Companies</th>
             </tr>
             <tr>
                 <th>Names</th>
                 <th>TVA</th>
                 <th>country</th>
                 <th>Type</th>
                 <th></th>
             </tr>
        </theader>
        <tbody>
        <?php $i = 0; foreach ($companies as $company) { ?>
               <tr class="<?= $i % 2 === 0 ? 'row1' : 'row2' ?>">
                    <td><a href="/company/show/1"><?= $company->name?></a></td>
                    <td><?= $company->vatnumber ?></td>
                    <td><?= $company->country ?></td>
                    <td><?= $company->type ?></td>
                    <td><a class="delete" href="/admin/company/delete<?php echo $company->id; ?>">🗑️</a></td>
               </tr>
               <?php $i++; } ?>
         </tbody>
 </table>

    <table class="container3index">
       
          <theader>
                <tr>
                     <th class="titletab3" colspan="5">Last Contacts</th>
                </tr>
                 <tr>
                     <th>Names</th>
                     <th>phone</th>
                     <th>E-mail</th>
                     <th>company</th>
                     <th></th>
                 </tr>
           </theader>
           <tbody>
           <?php $i = 0; foreach ($contacts as $contact) { ?>
               <tr class="<?= $i % 2 === 0 ? 'row1' : 'row2' ?>">
                    <td><a href="/contact/show/1"><?= $contact->firstname . ' ' . $contact->lastname ?></a></td>
                    <td><?= $contact->telephone ?></td>
                    <td><?= $contact->email ?></td>
                    <td><?= $contact->name ?></td>
                    <td><a class="delete" href="/admin/contact/delete<?php echo $contact->contact_person_id; ?>">🗑️</a></td>
               </tr>
               <?php $i++; } ?>
                 
           </tbody>
    </table>
 </div>  
</main>

