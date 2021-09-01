<?php


$login = false;

// function adminMenu () {
//     $userType = $row['user_type'];

//         if ($userType == 'admin') {
//             echo    "<li class='listItemHeader dropbtnHeader' id='adminHeader'>
//                         <div class='dropdownHeader'>
//                             <div class='hvr-growHeader'>
//                             <a href='#' >Admin</a> 
//                                 <i class='fa fa-caret-down'></i> </div>                   
//                             <div class='dropdown-contentHeader' ID='subMenuIDHeader'>
//                                 <a href='/admin' class='hvr-shrinkHeader'>Dashboard</a>
//                                 <a href='/admin/addcontact' class='hvr-shrinkHeader'>New Contact</a>
//                                 <a href='/admin/addinvoice' class='hvr-shrinkHeader'>New Invoice</a>
//                                 <a href='/admin/addcompany' class='hvr-shrinkHeader'>New Company</a>
//                             </div>
//                         </div>
//                     </li>";

//         } else if ($userType == 'moderator') {
//             echo    "<li class='listItemHeader dropbtnHeader' id='adminHeader'>
//                         <div class='dropdownHeader'>
//                             <div class='hvr-growHeader'>
//                             <a href='#' >Moderator</a> 
//                                 <i class='fa fa-caret-down'></i> </div>                   
//                             <div class='dropdown-contentHeader' ID='subMenuIDHeader'>
//                                 <a href='/admin' class='hvr-shrinkHeader'>Dashboard</a>
//                                 <a href='/admin/addcontact' class='hvr-shrinkHeader'>New Contact</a>
//                                 <a href='/admin/addinvoice' class='hvr-shrinkHeader'>New Invoice</a>
//                                 <a href='/admin/addcompany' class='hvr-shrinkHeader'>New Company</a>
//                             </div>
//                         </div>
//                     </li>";
//         } 

// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link rel=stylesheet href="/../css/style.css">
    <link rel=stylesheet href="/../css/reset.css">
    <link rel="stylesheet" href="/../css/styleindexviews.css">
    <link rel="stylesheet" href="/../css/styleindex.css">
    <link rel="stylesheet" href="/../css/addcompany.css">
    <link rel="stylesheet" href="/../css/addcontact.css">
    <link rel="stylesheet" href="/../css/addinvoice.css">
    <link rel="stylesheet" href="/../css/showinvoice.css">
    <link rel="stylesheet" href="/../css/companylist.css">
    <link rel="stylesheet" href="/../css/showcompany.css">
    <link rel="stylesheet" href="/../css/contactlist.css">
    <link rel="stylesheet" href="/../css/showcontact.css">
    <link rel="stylesheet" href="/../css/invoicelist.css">
    <link rel="stylesheet" href="/../css/showinvoice.css">
    <link rel="stylesheet" href="/../css/login.css">
    <title>COGIP</title>
</head>
<body>
    <header>
            <nav class ="navbarHeader">
                <div class="containerLogoHeader">
                    <a href="/">
                        <img class="logoHeader" src="/../assets/images/logo.png">
                    </a>
                </div>
                    <div class="menuHeader" id="toggleButtonHeader">
                        <div class="menuLineHeader"></div>
                        <div class="menuLineHeader"></div>
                        <div class="menuLineHeader"></div>
                    </div>
                <ul class="navListHeader" id="navListIdHeader">
                    <li class="listItemHeader">
                        <a href="/" class="hvr-growHeader">Home</a>
                    </li>
                    <li class="listItemHeader" >
                        <a href="/invoice" class="hvr-growHeader">Invoices</a>
                    </li>
                    <li class="listItemHeader">
                        <a href="/company" class="hvr-growHeader">Companies</a>
                    </li>
                    <li class="listItemHeader">
                        <a href="/contact" class="hvr-growHeader">Contacts</a>
                    </li>
                    <li class="listItemHeader dropbtnHeader" id="adminHeader">
                        <div class="dropdownHeader">
                            <div class="hvr-growHeader">
                            <a href="#" >Admin</a> 
                                <i class="fa fa-caret-down"></i> </div>                   
                            <div class="dropdown-contentHeader" ID="submenuIDHeader">
                                <a href="/admin" class="hvr-shrinkHeader">Dashboard</a>
                                <a href="/admin/addcontact" class="hvr-shrinkHeader">New Contact</a>
                                <a href="/admin/addinvoice" class="hvr-shrinkHeader">New Invoice</a>
                                <a href="/admin/addcompany" class="hvr-shrinkHeader">New Company</a>
                            </div>
                        </div>
                    </li>
                    <?php if (!$login){ ?>
                    <li class="listItemHeader" id="connectionHeader">
                        <a href="/login" class="hvr-growHeader">Connection</a>
                    </li>
                    <?php } ?>
                </ul>
               
            </nav>
    </header>
</body>
<script>
    var toggleButton = document.getElementById("toggleButtonHeader");
    var navList = document.getElementById("navListIdHeader");
    var admin = document.getElementById("adminHeader");
    var subMenuID = document.getElementById("subMenuIDHeader");

    toggleButton.addEventListener('click', () => {
        navList.classList.toggle('active');
    });
    

    admin.addEventListener('click', () => {
        subMenuID.style.display = "inline"; 
    });
</script>
</html>