<div class="main">
    <div class="about">
        <h2>About me</h2>
        <p>
            Hi, It's me. I'm Dogukan. I have been interested into programming since I was a kid.
            Now, I'm 19 years old boy and planned to study at university for my interest into programming.
            I'm hoping i can get into my favorite university. Meantime, I decided to try many programming languages
            but couldn't say I'm proficient on them. Between them, I like Javascript itself and use it on my most projects.
            Dedicated to learn the computer structure, hardware and it's components and more.            
        </p>
    </div>
    <div id="content">
        <!--LIST BLOGS-->
        <?php
           include_once "listBlogs.php"
        ?>
    </div>
    <div class="">
        <button id="next">Next</button>
        <button id="prev">Prev</button>
        <select id="count" required>
            <option value="" selected>ALL</option>
            <option value="2" >2</option>
            <option value="3">3</option>
            <option value="5">5</option>
        </select>
    </div>
</div>