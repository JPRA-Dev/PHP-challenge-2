<?php
?>
    <footer>
        <div class="fixed-footer">
            <div class="footerClass">  © 2021 COGIP, Inc.     "Vive la COGIP!"</div>        
        </div>
    </footer>
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
</body>
</html>