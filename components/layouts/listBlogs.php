<?php 
   for($i = 0; $i < count($result); $i++) {            
            $title = $result[$i]["title"];
            $date = $result[$i]["date"];
            $id = $result[$i]["id"];
        ?>
        <div class="content-wrapper">
            <p>
                Title : <?php echo $title; ?>
            </p>
            <p class="date">
                Published <?php echo $date; ?>
            </p>
            <?php
                switch($type) {
                    case "HOME":
                        ?>
                            <a href="index.php?blog=<?php echo $id; ?>">View</a>
                        <?php
                    break;

                    case "ADMIN":
                        ?>
                            <a href="admin.php?blog=<?php echo $id ?>">View</a>
                        <?php
                    break;
                }
            ?>
        </div>
<?php } 