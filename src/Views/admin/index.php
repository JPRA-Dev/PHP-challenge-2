<?php
?>
 <main>
        <div class="addbutton">
        
           <h1 class="indextitle">Hello, Jean-Christian!<br> What do you want to do today?</h1>
         
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
                    <td><?= $invoice->nbrinvoice?></td>
                    <td><?= $invoice->dateinvoice ?></td>
                    <td><?= $invoice->name ?></td>
                    <td><?= $invoice->type ?></td>
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
             <tr class="row1">
                 <td>Raviga</td>
                 <td>US456 654 342</td>
                 <td>United States</td>
                 <td>Fournisseur</td>
                 <td><a class="delete" href="">🗑️</a></td>
             </tr>
             <tr class="row2">
                <td>Dunder Mifflin</td>
                <td>US678 765 765</td>
                <td>United States</td>
                <td>Clients</td>
                <td><a class="delete" href="">🗑️</a></td>
             </tr>
             <tr class="row1">
                 <td>Pierre Cailloux</td>
                 <td>FR 678 908 654</td>
                 <td>France</td>
                 <td>Fournisseur</td>
                 <td><a class="delete" href="">🗑️</a></td>
             </tr>
             <tr class="row2">
                <td>Belgalol</td>
                <td>BE0876 654 665</td>
                <td>Belgique</td>
                <td>Fournisseur</td>
                <td><a class="delete" href="">🗑️</a></td>
             </tr>
             <tr class="row1">
                 <td>Jouets Jean-Michel</td>
                 <td>FR 677 544 000</td>
                 <td>France</td>
                 <td>Clients</td>
                 <td><a class="delete" href="">🗑️</a></td>
             </tr>
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
                     <th>compagny</th>
                     <th></th>
                 </tr>
           </theader>
           <tbody>
                 <tr class="row1">
                     <td>Peter Gregory</td>
                     <td>555-4567</td>
                     <td>peter.gregory@raviga.com</td>
                     <td>Raviga</td>
                     <td><a class="delete" href="">🗑️</a></td>
                </tr>
                 <tr class="row2">
                     <td>Cameron Howe</td>
                     <td>555-78967</td>
                     <td>cam.howe@mutiny.net</td>
                     <td>Mutiny</td>
                     <td><a class="delete" href="">🗑️</a></td>
                 </tr>
                 <tr class="row1">
                     <td>Gavin Belson</td>
                     <td>555-4213</td>
                     <td>gavin@hooli.com</td>
                     <td>Hoolir</td>
                     <td><a class="delete" href="">🗑️</a></td>
                 </tr>
                 <tr class=row2>
                     <td>Jiang Yang</td>
                     <td>555-4567</td>
                     <td>jian.yan@phoque.off</td>
                     <td>Phoque Off</td>
                     <td><a class="delete" href="">🗑️</a></td>
                 </tr>
                 <tr class="row1">
                     <td>Bertram Gilfoyle</td>
                     <td>555-098</td>
                     <td>gilfoyle@piedpiper.com</td>
                     <td>Pied Piper</td>
                     <td><a class="delete" href="">🗑️</a></td>
                 </tr>
           </tbody>
    </table>
 </div>  
</main>

