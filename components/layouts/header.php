<header id="header">
    <h2><a href="index.php">Dogukan's Blog</a></h2>
    <nav>
        <ul>
            <?php
                session_start();
                if(isset($_SESSION["auth"])) {
                 echo "<li><a href='admin.php'>Admin</a></li>"; 

                }
            ?>
        </ul>
    </nav>
</header>

