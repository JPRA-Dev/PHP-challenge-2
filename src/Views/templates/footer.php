<?php
?>
    <footer>
        <div class="fixed-footer">
            <div class="footer">  © 2021 COGIP, Inc.     "Vive la COGIP!"</div>        
        </div>
    </footer>
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
</body>
</html>