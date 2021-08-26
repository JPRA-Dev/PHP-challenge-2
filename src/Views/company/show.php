<?php
?>
<main>
    <h1>Company : <?= $id ?></h1>

    <div>
        N° TVA : <?= $id ?>
    </div>

    <div>
        type : <?= $type_client ?>
    </div>

    <div class="container">
    <caption>pepole_contact</caption>
   <table class="Contact_campany">
  
        <div class="colum">
        <tr>
           <th>Name</th>
           <th>phone</th>
           <th>email</th>
        </tr>
</div>

<div class="table_body">
  <tr>
      <td><a href="/contact/show/1">Peter Gregory</a></td>
      <td>555-4567</td>
      <td>peter_gregory@raviga.com</td>
  </tr>
  <tr>
      <td><a href="/contact/show/1">Peter Gregory</a></td>
      <td>555-4567</td>
      <td>peter_gregory@raviga.com</td>
  </tr>
  <tr>
      <td><a href="/contact/show/1">Peter Gregory</a></td>
      <td>555-4567</td>
      <td>peter_gregory@raviga.com</td>
  </tr>
 
  
</div>
</table>
<br>

<div class="container">
    <caption>invoices</caption>
   <table class="company_invoices">
  
        <div class="colum">
        <tr>
           <th>N° invoice</th>
           <th>date</th>
           <th>people contact</th>
        </tr>
</div>

<div class="table_body">
  <tr>
      <td><a href="/contact/show/1">F85632149-555</a></td>
      <td>04/04/2021</td>
      <td>peter_gregory@raviga.com</td>
  </tr>
  <tr>
      <td><a href="/contact/show/1">F85632149-555</a></td>
      <td>04/04/2021</td>
      <td>peter_gregory@raviga.com</td>
  </tr>
  <tr>
      <td><a href="/contact/show/1">F85632149-555</a></td>
      <td>04/04/2021</td>
      <td>peter_gregory@raviga.com</td>
  </tr>
 
  
</div>
</table>
</main>
