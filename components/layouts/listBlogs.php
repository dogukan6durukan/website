<?php 
    foreach($result as $post) {
?>
        <div class="content-wrapper">
            <p>
                <?= $post["title"]; ?>
            </p>
            <p class="date">
                Published <?= $post["date"]; ?>
            </p>
            <?php
                switch($type) {
                    case "HOME":
                        ?>
                            <a href="./<?= $post["url"] ?>">View</a>
                        <?php
                    break;

                    case "ADMIN":
                        ?>
                            <a href="admin.php?blog=<?= $post["url"] ?>">View</a>
                        <?php
                    break;
                }
            ?>
        </div>
<?php } 