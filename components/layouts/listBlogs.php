<?php 
    foreach($result as $post) {
?>
        <div class="content-wrapper">
            <p>
                Title : <?= $post["title"]; ?>
            </p>
            <p class="date">
                Published <?= $post["date"]; ?>
            </p>
            <?php
                switch($type) {
                    case "HOME":
                        ?>
                            <a href="index.php?blog=<?= $post["id"] ?>">View</a>
                        <?php
                    break;

                    case "ADMIN":
                        ?>
                            <a href="admin.php?blog=<?= $post["id"] ?>">View</a>
                        <?php
                    break;
                }
            ?>
        </div>
<?php } 