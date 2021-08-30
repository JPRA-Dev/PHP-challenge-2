<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<<<<<<< HEAD
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link rel=stylesheet href="assets/css/style.css">
    <link rel=stylesheet href="assets/css/reset.css">
=======
    <link rel="stylesheet" href="/../css/styleindex.css">
>>>>>>> 2240bb82c16fb02250a45f7de7438478d5e93226
    <title>COGIP</title>
</head>
<body>
    <header>
            <nav class ="navbar">
                <div class="containerLogo">
                    <a href="#">
                        <img class="logoHeader" src="assets/images/COGIP_LOGO.png">
                    </a>
                </div>
                <ul class="navList" id="navListId">
                    <li class="listItem">
                        <a href="#" class="hvr-grow">Home</a>
                    </li>
                    <li class="listItem" >
                        <a href="#" class="hvr-grow">Invoices</a>
                    </li>
                    <li class="listItem">
                        <a href="#" class="hvr-grow">Companies</a>
                    </li>
                    <li class="listItem">
                        <a href="#" class="hvr-grow">Contacts</a>
                    </li>
                    <li class="listItem dropbtn" id="admin">
                        <div class="dropdown">
                            <div class="hvr-grow">
                            <a href="#" >Admin</a> 
                                <i class="fa fa-caret-down"></i> </div>                   
                            <div class="dropdown-content" ID="submenuID">
                                <a href="#" class="hvr-shrink">Dashboard</a>
                                <a href="#" class="hvr-shrink">New Contact</a>
                                <a href="#" class="hvr-shrink">New Invoice</a>
                                <a href="#" class="hvr-shrink">New Company</a>
                            </div>
                        </div>
                    </li>
                    <li class="listItem" id="connection">
                        <a href="#">Connection</a>
                    </li>
                </ul>
                <div class="menu" id="toggleButton">
                    <div class="menuLine"></div>
                    <div class="menuLine"></div>
                    <div class="menuLine"></div>
                </div>
            </nav>
    </header>
</body>
<script>
    var toggleButton = document.getElementById("toggleButton");
    var navList = document.getElementById("navListId");
    var admin = document.getElementById("admin");
    var subMenuID = document.getElementById("subMenuID");

    toggleButton.addEventListener('click', () => {
        navList.classList.toggle('active');
    });

    admin.addEventListener('click', () => {
        subMenuID.style.display = "inline"; 
    });
</script>
</html>