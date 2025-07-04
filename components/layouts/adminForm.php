<div class="contentWrapper">
    <h2>
        <?php 
            $formTitle = isset($_GET["blog"]) ? "Update Blog" : "Add Blog";
            echo $formTitle;
        ?>
    </h2>
        <?php
            if(isset($_GET["blog"])) {
        ?>
            <a href="./">Home</a>
            <a href="./admin.php">Admin</a>
        <?php } ?>
    <form action="<?php echo isset($_GET["blog"]) ? 'admin.php?blog='.$id : 'admin.php';?>" method="post" class="contentForm">
        <div>
            Title <input type="text" value="<?php if(isset($_GET["blog"])) { echo $result["title"]; } ?>" name="title" id="" required>
        </div>
        <div>
            Content : 
            <div>
                <textarea name="content" id="" required><?php if(isset($_GET["blog"])) { echo $result["content"]; } ?></textarea>
            </div>
        </div>
        <div>
            Publish Date : <input type="date" name="date" value="<?php if(isset($_GET["blog"])) { echo $result["date"]; } ?>" id="date" value="" required>
        </div>
        <input type="submit" name="submit">
            <?php
                if(isset($_GET["blog"])) {
            ?>
        <input type="hidden" name="id" value="<?php echo $result["id"]; ?>">
        <input type="submit" name="delete" value="Delete">
            <?php } ?>
    </form>
</div>