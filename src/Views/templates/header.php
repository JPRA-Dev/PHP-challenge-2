<?php

global $user;
$login = $user->isLoggedIn();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link rel=stylesheet href="/../assets/css/style.css">
    <link rel=stylesheet href="/../css/reset.css">
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
                    <?php if (!$login){ ?>
                    <li class="listItemHeader" id="connectionHeader">
                        <a class="connect" href="/login">Login</a>
                    </li>
                    <?php } else { ?>
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
                                <a href="/logout" class="hvr-shrinkHeader">Logout</a>
                            </div>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </nav>
    </header>
