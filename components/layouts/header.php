<div id="header">
    <h2><a href="index.php">Dogukan's Blog</a></h2>
    <nav>
        <ul>
            <?php
                session_start();
                if(isset($_SESSION["auth"])) {
                    echo '<a href="admin.php" style="color : red">Admin Page<a/>';
                }
            ?>
            <li><a href="https://github.com/dogukan6durukan">Github</li>
            <li><a href="mailto:dogukan6durukan@gmail.com">Gmail</a></li>
        </ul>
    </nav>
</div>