<?php
?>
<main>

<h1 class="companyshowtitle">Company:</h1> 

   <div class="tvatype">
      <p>TVA:</p>
      <p>Type:</p>
   </div>

  <div class="containercompanyshow">
    <h3>Contact Persons</h3>
        <table class="container1companyshow">
           <tr>
              <th>Name</th>
              <th>Phone</th>
              <th>Email</th>
           </tr>
           <tr class="row1">
              <td><a href="/contact/show/1">Dwight Schrute</a></td>
              <td>555-9859</td>
              <td>dwight.schrute@ddmfl.com</td>
           </tr>
           <tr class="row2">
              <td><a href="/contact/show/1">Kelly Kapoor</a></td>
              <td>555-9858</td>
              <td>kelly.kapoor@ddmfl.com</td>
            </tr>
            <tr class="row1">
              <td><a href="/contact/show/1">Creed Bratton</a></td>
              <td>555-9856</td>
              <td>creed.bratton@ddmfl.com</td>
            </tr>
        </table>

    <h3>Invoices</h3>
       <table class="container1companyshow">
           <tr>
               <th>Invoice Number</th>
               <th>Date</th>
               <th>Contact Person</th>
            </tr>

            <tr class="row1"> 
                <td><a href="/contact/show/1"><?php echo $invoice->nbrinvoice; ?></a></td>
                <td><?php echo $invoice->dateinvoice; ?></td>
                <td><?php echo $invoice->firstname . ' ' . $invoice->lastname; ?></td>
            </tr>
        </table>
    </div>
</main>
